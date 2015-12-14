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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/templates', function () {
    return view('templates');
});

Route::post('/upload', 'UploadController@upload');

Route::get('/login', 'Auth\AuthController@facebookLogin');
Route::get('/facebook', 'Auth\AuthController@handleProviderCallback');

Route::get('/home', 'HomeController@index');

