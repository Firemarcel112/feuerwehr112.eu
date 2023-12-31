<?php

namespace App\Listeners;

use App\Events\NeuerBenutzer;
use App\Models\EmailVerifizierung;
use Illuminate\Support\Str;

class EmailVerifizierungTokenErstellen
{
	/**
	 * Create the event listener.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 */
	public function handle(NeuerBenutzer $event): void
	{
		$verifizierung = new EmailVerifizierung();
		$user_id = $event->user->getId();
		$email = $event->user->getEmail();
		if(!empty($verifizierung->isUserId($user_id)->first()))
		{
			$verifizierung = $verifizierung->isUserId($user_id)->first();
		}
		else
		{
			$verifizierung->setUserId($user_id);
			$verifizierung->setEmail($email);
		}
		$verifizierung->setToken(Str::random(30));
		$verifizierung->setLaueftAb(now()->minutes(10));
		$verifizierung->save();
	}
}
