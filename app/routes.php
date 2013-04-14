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

Route::get('prueba/{username?}', function($username = null){
	$id =  User::verified()
	 			->where('username', '=', $username)
	 			->pluck('id');
	
	$friends = DB::table('relationships')
						->where('type_id', '=', 1)
						->where('accepted', '=', 1)
						->where('user_a', '=', $id)
						->orWhere('user_b', '=', $id)
						//->join('relationship_types', 'type_id', 'relationship_types.id')
						->leftJoin('users', function($join){
							$join->on('users.id', '=', 'relationships.user_a')
							     ->orOn('users.id', '=','relationships.user_b');
						})->get(array('username', 'user_a', 'user_b', 'accepted', 'type_id'));

	return Response::json($friends);
	// return = DB::table('users')
	// 				->where('verified', '=', 1)
	// 				->where('username', '=', $username)
	// 				->join('relationships', function($join){
	// 					$join->on('users.id', '=','relationships.user_a')
	// 						 ->orOn('users.id', '=','relationships.user_b');
	// 				});			
	//$profiler = new Profiler\Profiler(new Profiler\Logger\Logger);
	//$profiler->log->debug($test);
	//$profiler = Profiler::logDebug($friends);
	//echo $profiler;
	//return $friends;
	//return $test;
});