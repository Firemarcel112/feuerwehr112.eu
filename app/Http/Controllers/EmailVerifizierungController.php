<?php

namespace App\Http\Controllers;

use App\Events\NeuerBenutzer;
use App\Models\EmailVerifizierung;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerifizierungController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		return view('emailverifizierung', [
			'email' => $request->email?? null,
			'token' => $request->token?? null,
		]);
	}

	public function bestaetigen(Request $request)
	{
		if(!empty($request->neuer_link))
		{
			$user = User::isEmail($request->email)
				->first();
			if(!empty($user))
			{
				NeuerBenutzer::dispatch($user);
				$this->setSuccessMessage(__('general.neuer_link_angefordert'));
			}
			else
			{
				$this->setErrorMessage(__('general.fehler_beim_link_anfordern'));
			}
			return back();
		}
		$email = $request->email;
		$token = $request->token;

		if(EmailVerifizierung::valid($email, $token))
		{
			$this->setSuccessMessage(__('general.email_verifiziert'));
		}
		else
		{
			return back();
		}
		return redirect()->route('login');
	}
}
