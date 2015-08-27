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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('file/add', 'FileController@create');
Route::post('file/add', 'FileController@handleCreate');

Route::get('file/delete', 'FileController@delete');
Route::post('file/delete', 'FileController@handleDelete');

Route::get('file', 'FileController@index');
Route::get('message', 'MailController@index');

Route::get('test', 'FileController@test');

Route::post('message', 'MailController@compose');



//Route::get('/', 'DropzoneController@index');
//Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');