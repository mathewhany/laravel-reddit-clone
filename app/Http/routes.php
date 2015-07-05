<?php

Route::get('/', ['as' => 'home', 'uses' => 'LinkController@index']);
Route::get('home', 'LinkController@index');

Route::resource('links', 'LinkController', ['except' => ['show']]);

Route::controllers([
	'auth' => 'Auth\AuthController'
]);