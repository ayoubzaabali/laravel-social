<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasInterestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_has_interests', function(Blueprint $table)
		{
			$table->integer('user_id')->index('IDX_79F3AF5A76ED395');
			$table->integer('interest_id')->index('interest_fk');
			$table->primary(['user_id','interest_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_has_interests');
	}
}
