<?php

namespace App\Http\Controllers\Auth;

use App\Events\NeuerBenutzer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrierenRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrierenController extends Controller
{

	/**
	 * Index funktion
	 *
	 */
	public function index()
	{
		if(auth()->user())
		{
			$this->setSuccessMessage(__('general.bereits_angemeldet'));
			return redirect()->route('home');
		}
		return view('auth.registrieren');
	}

	/**
	 * Benutzer Registrieren
	 *
	 * @param Request $request
	 */
	public function registrieren(RegistrierenRequest $request)
	{
		$request->flash();
		$error = false;
		$user = new User();
		if($user::isBenutzername($request->benutzername)->first())
		{
			$this->setErrorMessage(__('general.benutzername_existiert_bereits'));
			$error = true;
		}
		if($user::isEmail($request->email)->first())
		{
			$this->setErrorMessage(__('general.email_existiert_bereits'));
			$error = true;
		}

		if(!$error)
		{
			$user->setBenutzername($request->benutzername);
			$user->setEmail($request->email);
			$user->setPasswort(Hash::make($request->passwort));
			$user->save();

			$this->setSuccessMessage(__('general.account_erfolgreich_erstellt'));
			NeuerBenutzer::dispatch($user);
			return redirect()->route('login');
		}
		else
		{
			return back();
		}
	}

}
