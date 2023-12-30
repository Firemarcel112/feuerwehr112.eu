<?php

Use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback(function(Request $request)
{
	abort(404);

});

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('registrieren', 'Auth\RegistrierenController@index')->name('registrieren');
Route::post('registrieren', 'Auth\RegistrierenController@registrieren');
Route::prefix('verifizierung')->as('verifizierung.')->group(function()
{
	Route::get('email', 'EmailVerifizierungController@index')->name('email');
	Route::post('email', 'EmailVerifizierungController@bestaetigen');
});

