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
		Schema::create('profil_kommentare', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('profil_id');
			$table->bigInteger('user_id')->comment('Author vom Kommentar');
			$table->longText('kommentar');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('profil_kommentare');
	}
};
