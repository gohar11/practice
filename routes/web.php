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
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/store', 'HomeController@storePost')->name('store');

    Route::post('/comment/store', 'HomeController@storeComment')->name('comment.store');
    Route::post('/reply/store', 'HomeController@replyComment')->name('reply.store');
});

Route::get('test', function () {
    event(new App\Events\StatusLiked('Nomi'));
    return "Event has been sent!";
});

Route::get('check', function () {
    return view('welcome-home');
});

Route::get('mark_read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('mark_read');