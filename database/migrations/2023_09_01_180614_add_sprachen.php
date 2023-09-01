<?php

use App\Models\Sprache;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		$sprache = new Sprache();
		$sprache->setCode('de');
		$sprache->setBezeichnung('Deutsch');
		$sprache->save();

		$sprache = new Sprache();
		$sprache->setCode('en');
		$sprache->setBezeichnung('Englisch');
		$sprache->save();
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{

	}
};
