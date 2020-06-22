<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/admin-dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('/favourites', 'BookController@favourites')->name('book.favourites')->middleware('auth');
Route::post('/book/favouriteToggle', 'BookController@toggleFavourites')->name('book.toggleFavourites')->middleware('auth');

Route::resources([
    'books' => 'BookController',
    'authors' => 'AuthorController',
    'genres' => 'GenreController'
]);

Route::get('/books/{book:slug}', 'BookController@show')->name('books.show')->middleware('auth');
Route::get('/genres/{genre:slug}', 'GenreController@show')->name('genres.show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::group(['middleware' => 'is.admin'], function () {
//     Route::get('/user/{data}', 'UserController@getData');
//     Route::post('/user/{data}', 'UserController@postData');
// });