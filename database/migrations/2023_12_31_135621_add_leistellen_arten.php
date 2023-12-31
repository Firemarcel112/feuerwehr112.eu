<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Leitstelle\Art;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		$model = new Art();
		$model->setName('Integrierte Leitstelle');
		$model->setKuerzel('ILS');
		$model->save();

		$model = new Art();
		$model->setName('Feuerwehreinsatzzentrale');
		$model->setKuerzel('FEZ');
		$model->save();

		$model = new Art();
		$model->setName('Haupteinsatzzentrale');
		$model->setKuerzel('HEZ');
		$model->save();

		$model = new Art();
		$model->setName('Feuerwehrleitstelle');
		$model->setKuerzel('FLSt');
		$model->save();

	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};
