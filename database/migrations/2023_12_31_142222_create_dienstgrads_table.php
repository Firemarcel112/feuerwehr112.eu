<?php

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
		Schema::create('dienstgrade', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->tinyInteger('art_id')->nullable()->comment('Wenn nur in einer Spezifischen Feuerwehr');
			$table->tinyInteger('bundesland_id')->nullable()->comment('Wenn nur in bestimmten Bundesland');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('dienstgrade');
	}
};
