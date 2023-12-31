<?php

namespace App\Providers;

use App\Events\NeuerBenutzer;
use App\Listeners\EmailVerifizierungSenden;
use App\Listeners\EmailVerifizierungTokenErstellen;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event to listener mappings for the application.
	 *
	 * @var array<class-string, array<int, class-string>>
	 */
	protected $listen = [
		NeuerBenutzer::class => [
			EmailVerifizierungTokenErstellen::class,
			EmailVerifizierungSenden::class
		],
	];

	/**
	 * Register any events for your application.
	 */
	public function boot(): void
	{
		//
	}

	/**
	 * Determine if events and listeners should be automatically discovered.
	 */
	public function shouldDiscoverEvents(): bool
	{
		return false;
	}
}
