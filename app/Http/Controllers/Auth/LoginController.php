<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

	public function index()
	{
		return view('auth/login');
	}

	public function authenticate(Request $request): RedirectResponse
	{
		$request->flash();

		$credentials = $request->validate([
			'benutzername' => ['required'],
			'passwort' => ['required'],
		]);

		if(Auth::attempt($credentials, $request->erinnern?? false))
		{
			$request->session()->regenerate();

			return redirect()->route('home');
		}

		$this->setErrorMessage(__('general.fehler_beim_einloggen'));
		return back()->onlyInput('email');
	}
}
