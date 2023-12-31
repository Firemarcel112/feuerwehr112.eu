<?php

namespace App\Listeners;

use App\Events\NeuerBenutzer;
use App\Mail\EmailVerifizierungMail;
use Illuminate\Support\Facades\Mail;

class EmailVerifizierungSenden
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
		$email = $event->user->getEmail();
		$benutzername = $event->user->getBenutzername();
		$token = $event->user->emailverifizierung->getToken();
		$url = route('verifizierung.email') . "?token={$token}&email={$email}";

		Mail::to($email, $benutzername)
			->send(new EmailVerifizierungMail($benutzername, $url));
	}
}
