<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotificationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notification', function(Blueprint $table)
		{
			$table->foreign('document_id', 'doc_fk_not')->references('id')->on('document')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'user_fk_not')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification', function(Blueprint $table)
		{
			$table->dropForeign('doc_fk_not');
			$table->dropForeign('user_fk_not');
		});
	}
}
