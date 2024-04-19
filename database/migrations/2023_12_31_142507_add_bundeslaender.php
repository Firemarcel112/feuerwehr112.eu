<?php

use App\Models\Bundesland;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		$model = new Bundesland();
		$model->setName('Baden-Württemberg');
		$model->setHauptstadt('Stuttgart');
		$model->save();

		$model = new Bundesland();
		$model->setName('Bayern');
		$model->setHauptstadt('München');
		$model->save();

		$model = new Bundesland();
		$model->setName('Berlin');
		$model->setHauptstadt('Berlin');
		$model->save();

		$model = new Bundesland();
		$model->setName('Brandenburg');
		$model->setHauptstadt('Potsdam');
		$model->save();

		$model = new Bundesland();
		$model->setName('Bremen');
		$model->setHauptstadt('Bremen');
		$model->save();

		$model = new Bundesland();
		$model->setName('Hamburg');
		$model->setHauptstadt('Hamburg');
		$model->save();

		$model = new Bundesland();
		$model->setName('Hessen');
		$model->setHauptstadt('Wiesbaden');
		$model->save();

		$model = new Bundesland();
		$model->setName('Mecklenburg-Vorpommern');
		$model->setHauptstadt('Schwerin');
		$model->save();

		$model = new Bundesland();
		$model->setName('Niedersachsen');
		$model->setHauptstadt('Hannover');
		$model->save();

		$model = new Bundesland();
		$model->setName('Nordrhein-Westfalen');
		$model->setHauptstadt('Düsseldorf');
		$model->save();

		$model = new Bundesland();
		$model->setName('Rheinland-Pfalz');
		$model->setHauptstadt('Mainz');
		$model->save();

		$model = new Bundesland();
		$model->setName('Saarland');
		$model->setHauptstadt('Saarbrücken');
		$model->save();

		$model = new Bundesland();
		$model->setName('Sachsen');
		$model->setHauptstadt('Dresden');
		$model->save();

		$model = new Bundesland();
		$model->setName('Sachsen-Anhalt');
		$model->setHauptstadt('Magdeburg');
		$model->save();

		$model = new Bundesland();
		$model->setName('Schleswig-Holstein');
		$model->setHauptstadt('Kiel');
		$model->save();

		$model = new Bundesland();
		$model->setName('Thüringen');
		$model->setHauptstadt('Erfurt');
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
