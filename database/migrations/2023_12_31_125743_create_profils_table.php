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
		Schema::create('profile', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id');
			$table->enum('geschlecht', ['M', 'W', 'D'])->nullable();
			$table->string('avatar_pfad')->nullable();
			$table->string('banner_pfad')->nullable();
			$table->longText('signatur')->nullable();
			$table->date('geburtsdatum')->nullable();
			$table->longText('beschreibung')->nullable();
			$table->tinyinteger('sichtbar')->default(0)
				->comment('0 = Privat/Admins, 1 = Öffentlich, 2 = Nur Freunde');
			$table->bigInteger('feuerwehr_id')->nullable();
			$table->integer('dienstgrad_id')->nullable();
			$table->integer('funktion_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('profile');
	}
};
