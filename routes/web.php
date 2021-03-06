<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use TCG\Voyager\Facades\Voyager;

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



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/profile', 'ProfileController@index')->middleware('verified')->name('profile');
Route::post('/profile', 'ProfileController@update')->middleware('verified')->name('profile-post');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect('/');
 });