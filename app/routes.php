<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::controller('usuario', 'UserController');

Route::get('prueba/{username?}', function($username){
	return User::where('username', '=', $username)->with('profile', 'roles')->get();
});