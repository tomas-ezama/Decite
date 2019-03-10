<?php

use App\Booking;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/comment', function(Request $request) {

    $validation = Validator::make($request->all(), [ 
        'comment' => 'required',
    ]);
    
    if ($validation->fails()) {
        $data = [
            'status' => 'error',
            'data' => [
                'errors' => 'No puede quedar en blanco.',
            ],
        ];
    }else{
        $result = Comment::create([
            'comment' => $request['comment'],
            'user_id' => $request['user_id'],
            'professor_id' => $request['professor_id'],
        ]);
    
        $data = [
            'status' => ($result) ? 'ok' : 'error',
            'data' => ($result) ? 'Perfecto!' : [ 'errors' => 'Hubo un error...' ],
        ];
    }

    return response()->json($data);
});

Route::get('/comment/{user}', function(User $user) {
    $comments = Comment::where('professor_id', $user->id)->get();
    $comments->map(function ($comment) {
        return $comment['user'] = $comment->user;
    });

    $data = [
        'status' => 'ok',
        'data' => [
            'comments' => $comments->toArray(),
        ],
    ];
    return response()->json($data);
});

Route::get('/professors/calendar/{user}', function(User $user) {
    $bookings = Booking::where('professor_id', $user->id)->get();
    return response()->json($bookings);
});