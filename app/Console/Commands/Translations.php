<?php

namespace App\Console\Commands;

use App\Models\Sprache;
use Barryvdh\TranslationManager\Models\Translation;
use Illuminate\Console\Command;

class Translations extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:translations';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Synchronisiert die Sprachkeys und sucht nach fehlenden Sprachkeys';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$this->info('Synchronisiere Sprachkeys');
		$this->call('translation:import');
		$this->info('Suche nach fehlenden Sprachkeys');
		$this->call('translation:find');
		$this->info('Synchronisieren abgeschlossen');
	}
}
