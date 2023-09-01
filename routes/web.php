<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordVergessenController;
use App\Http\Controllers\Auth\RegistrierenController;
Use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::fallback(function(Request $request)
{
	if(config('app.debug'))
	{
		dd($request);
	}
	echo 'TODO: errorpage';

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/translations', [\Barryvdh\TranslationManager\Controller::class, 'getIndex'])->name('translations');

Route::controller(LoginController::class)->group(function(){
	Route::get('login', 'index')->name('login');
});

Route::controller(RegistrierenController::class)->group(function()
{
	Route::get('registrieren', 'index')->name('registrieren');
});

Route::controller(PasswordVergessenController::class)->group(function()
{
	Route::get('passwort-vergessen', 'index')->name('passwort_vergessen');
});
