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
		Schema::create('feuerwehren', function (Blueprint $table) {
			$table->id();
			$table->tinyInteger('art_id');
			$table->integer('leistelle_id');
			$table->longText('beschreibung')->nullable();
			$table->string('kontakt')->nullable();
			$table->string('webseite')->nullable();
			$table->string('kuerzel')->nullable();
			$table->integer('einsatzanzahl')->nullable();
			$table->integer('mitglieder')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('feuerwehren');
	}
};
