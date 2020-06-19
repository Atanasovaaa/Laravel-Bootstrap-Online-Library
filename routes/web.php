<?php

use App\Http\Controllers\GenreController;
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

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/admin-dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('/favourites', 'BookController@favourites')->name('book.favourites')->middleware('auth');
Route::post('/book/favouriteToggle', 'BookController@toggleFavourites')->name('book.toggleFavourites')->middleware('auth');

Route::resources([
    'books' => 'BookController',
    'authors' => 'AuthorController',
    'genres' => 'GenreController'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::group(['middleware' => 'is.admin'], function () {
//     Route::get('/user/{data}', 'UserController@getData');
//     Route::post('/user/{data}', 'UserController@postData');
// });