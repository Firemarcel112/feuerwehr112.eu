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
		$verifizierung->setUserId($event->user->getId());
		$verifizierung->setEmail($event->user->getEmail());
		$verifizierung->setToken(Str::random(30));
		$verifizierung->setLaueftAb(now()->addHours());
		$verifizierung->save();
	}
}
