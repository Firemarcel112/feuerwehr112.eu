<?php

use App\Models\Feuerwehr\Art;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		$model = new Art();
		$model->setName('Freiwillige Feuerwehr');
		$model->setKuerzel('FFW');
		$model->save();

		$model = new Art();
		$model->setName('Berufsfeuerwehr');
		$model->setKuerzel('BF');
		$model->save();

		$model = new Art();
		$model->setName('Werkfeuerwehr');
		$model->setKuerzel('WF');
		$model->save();

	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{

	}
};
