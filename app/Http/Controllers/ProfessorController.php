<?php


namespace App\Http\Controllers;

use App\Booking;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request['q'])) {
            $professors = [];
            $category = Category::where('name', $request['q'])->first();
            if ($category) {
                if (isset($request['zona'])) {
                    $profs = User::where('role', 1)->where('zona', $request['zona'])->get();
                } else {
                    $profs = User::where('role', 1)->get();
                }
                foreach ($profs as $professor) {
                    $hasCategory = $professor->categories->where('id', $category->id);
                    if (!$hasCategory->isEmpty()) {
                        $professors[] = $professor;
                    }
                }
            }
        } else {
            if (isset($request['zona'])) {
                $professors = User::where('role', 1)->where('zona', $request['zona'])->get();
            } else {
                $professors = User::where('role', 1)->get();
            }
        }

        return view('professors.index')->with('professors', $professors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $professor)
    {
        return view('professors.show')->with('professor', $professor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCategory(Request $request, Category $category) {
        $request->user()->categories()->detach($category->id);
        return back();
    }

    public function addCategory(Request $request) {
        $request->user()->categories()->attach($request->input('category'));
        return back();
    }

    public function booking(Request $request, User $professor) {       
        Booking::create([
            'title' => 'Reserva de '.$request->user()->name,
            'start' => $request->day . ' ' . $request->time . ':00',
            'end' => $request->day . ' ' . ((int)$request->time + (int)$request->count) . ':00',
            'user_id' => $request->user()->id,
            'professor_id' => $professor->id,
        ]);
        return redirect('/booking');
    }

    public function calendar(Request $request) {
        return view('professors.calendar');
    }
}
