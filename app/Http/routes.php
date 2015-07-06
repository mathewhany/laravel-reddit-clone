<?php

Route::get('/', ['as' => 'home', 'uses' => 'LinkController@index']);
Route::get('home', 'LinkController@index');

Route::get('links/{links}/vote-up', 'VoteController@voteUp');
Route::get('links/{links}/vote-down', 'VoteController@voteDown');
Route::get('links/{links}/undo-vote', 'VoteController@undoVote');

Route::resource('links', 'LinkController', ['except' => ['show']]);

Route::controllers([
	'auth' => 'Auth\AuthController'
]);