<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadedByTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('downloaded_by', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_user_has_document1_user1_idx');
			$table->integer('document_id')->index('fk_user_has_document1_document1_idx');
			$table->timestamp('creation')->nullable();
			$table->primary(['user_id','document_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('downloaded_by');
	}
}
