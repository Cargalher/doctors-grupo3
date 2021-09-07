<?php


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

Route::post('review/{user}', 'ReviewController@saveReview')->name('saveReview');

// Rotta temporanea che stampa i dottori tramite API & VUE
Route::get('vue-doctors', function () {
    return view('vue-doctors');
})->name('vue-doctors');

// Route DOCTOR
Auth::routes();

Route::get('/doctor/home', 'UserController@index')->name('dashboard');

Route::get('/doctor/messages', 'UserController@messages')->name('messages');

Route::get('/doctor/reviews', 'UserController@reviews')->name('reviews');

Route::get('/doctor/sponsors', 'UserController@sponsors')->name('sponsors');

Route::get('/doctor/statistics', 'ChartController@index')->name('statistics');

// Route::post('/sponsor/{user}', 'UserController@saveSponsor')->name('saveSponsor');

Route::resource('doctor', UserController::class);
Route::resource('messages', MessageController::class);

// Payment
Route::get('sponsors/{user}', 'SponsorController@buySponsorship')->name('buySponsorship');
Route::post('checkout/{user}', 'PaymentController@checkout')->name('checkout');
