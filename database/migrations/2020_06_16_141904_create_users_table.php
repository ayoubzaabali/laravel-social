<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('job_id')->nullable()->index('fk_user_job');
			$table->string('name')->nullable();
			$table->string('prenom')->nullable();
			$table->longText('overview')->nullable();
			$table->string('password')->nullable();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('photo', 254)->nullable();
			$table->string('cover', 254)->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
