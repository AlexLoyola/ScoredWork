<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/workboard','usersController@show');
Route::post('/log','landingController@loggear');
Route::post('/logreg','landingController@logreg');
Route::get('/profile','usersController@profile');
Route::post('/findEvent','eventController@getEvent');
Route::post('/assist','eventController@assist');
Route::get('/test','eventController@test');
Route::get('/admin','pageController@admin');
Route::get('/logout','pageController@logout');
Route::get('/editarEvento','eventController@edit');

Route::post('/upload', 'eventController@upload');

Route::get('/index','pageController@getIndex');
Route::get('/','pageController@getIndex');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

