<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('fk_event_type1_idx');
			$table->string('titre', 254)->nullable();
			$table->timestamp('date_creation')->nullable();
			$table->longText('original_name');
			$table->longText('photo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}
}
