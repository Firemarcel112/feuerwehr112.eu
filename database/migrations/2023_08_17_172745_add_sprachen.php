<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Sprache;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Sprache::create([
			'code' => 'de',
			'bezeichnung' => 'Deutsch',
		]);

		Sprache::create([
			'code' => 'us',
			'bezeichnung' => 'Englisch',
		]);
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};
