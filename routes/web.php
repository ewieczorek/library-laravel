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

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an ID of '.$id;
});
*/

//Route::get('/', 'shelvesController@index');
Route::get('/about', 'BookController@about');
Route::get('/loginPage', 'BookController@loginPage');
Route::get('/booksCreate', 'BookController@booksCreate');

Route::get('/login', function () {
    return view('login');
});

Route::get('/libraryScreen', function () {
    return view('libraryScreen');
});

Route::get('/', function () {
    return view('pages.index');
});

route::resource('books', 'BookController');
route::resource('shelves', 'shelvesController');
route::resource('loans', 'loanController');

Auth::routes();

Route::post('/returnBook', 'BookController@returnBook');
Route::get('/home', 'HomeController@index')->name('home');
