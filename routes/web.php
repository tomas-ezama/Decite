<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WebController@index');
Route::get('/faq','WebController@faq');
Route::get('/register','WebController@register');
Route::get('/login','WebController@login');
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function() {
    Route::get('/','UserController@show')->name('show');
    Route::post('/', 'UserController@update')->name('update');
});

Route::prefix('professor')->name('professor.')->group(function() {
    Route::get('/', 'ProfessorController@index')->name('index');
    Route::get('/calendar', 'ProfessorController@calendar')->name('calendar');
    Route::get('/{professor}', 'ProfessorController@show')->name('show');
    Route::post('/category', 'ProfessorController@addCategory')->name('category.add')->middleware('auth');
    Route::post('/{professor}/Booking', 'ProfessorController@booking')->name('booking');
    Route::delete('/category/{category}', 'ProfessorController@deleteCategory')->name('category.delete')->middleware('auth');
});

Route::get('admin', 'CategoryController@index');
Route::post('admin','CategoryController@createCategory')->name('newCat');
Route::delete('admin','CategoryController@deleteCategory')->name('delCat');

Route::get('/booking', function () {
    return view('bookings');
});

Auth::routes();
