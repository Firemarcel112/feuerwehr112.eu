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
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('registrieren', 'Auth\RegistrierenController@index')->name('registrieren');
Route::post('registrieren', 'Auth\RegistrierenController@registrieren');
Route::prefix('verifizierung')->as('verifizierung.')
	->controller('EmailVerifizierungController')->group(function()
{
	Route::get('email', 'index')->name('email');
	Route::post('email', 'bestaetigen');
});

Route::prefix('profil')->as('profil.')
	->controller('Profil\ProfilController')->group(function()
{
	Route::get('{benutzername}', 'index')->name('index');

	Route::get('{benutzername}/bearbeiten', 'edit')->name('bearbeiten');
});
