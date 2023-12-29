<?php

Use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback(function(Request $request)
{
	abort(404);

});

Route::get('/', 'HomeController@index')->name('home');

