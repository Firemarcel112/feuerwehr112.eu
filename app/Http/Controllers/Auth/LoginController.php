<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

	public function index()
	{
		if(auth()->user())
		{
			$this->setSuccessMessage(__('general.bereits_angemeldet'));
			return redirect()->route('home');
		}
		return view('auth/login');
	}

	public function authenticate(LoginRequest $request): RedirectResponse
	{
		$request->flash();

		$user = User::isBenutzername($request->benutzername)
			->first();

		if(empty($user))
		{
			$this->setErrorMessage(__('general.fehler_beim_anmelden') . ' ERROR:100');
		}
		else
		{
			if(Hash::check($request->passwort, $user->getPasswort()))
			{
				if(empty($user->getEmailVerifiedAt()))
				{
					$this->setErrorMessage(__('general.email_verifizierung_fehlt'));
					return back();
				}
				if($user->getGebannt() == 1)
				{
					$this->setErrorMessage(__('general.account_gebannt'));
					return back();
				}
				Auth::loginUsingId($user->getId(), $request->erinnern);

				$request->session()->regenerate();
				return redirect()->route('home');
			}
		}
		$this->setErrorMessage(__('general.fehler_beim_anmelden') . ' ERROR:101');
		return back()->onlyInput('benutzername');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerate();
		return back();
	}
}
