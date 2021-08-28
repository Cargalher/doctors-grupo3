<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route GUEST
Route::get('/', 'HomeController@index')->name('home');

Route::get('/doctors/{user}', 'HomeController@show')->name('show');

Route::post('show/{user}', 'MessageController@saveMessage')->name('saveMessage');

// Route DOCTOR
Auth::routes();

Route::get('/home', 'UserController@index')->name('dashboard');


