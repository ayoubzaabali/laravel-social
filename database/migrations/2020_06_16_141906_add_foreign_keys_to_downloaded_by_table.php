<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDownloadedByTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('downloaded_by', function(Blueprint $table)
		{
			$table->foreign('document_id', 'fk_user_has_document1_document1')->references('id')->on('document')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_user_has_document1_user1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('downloaded_by', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_has_document1_document1');
			$table->dropForeign('fk_user_has_document1_user1');
		});
	}
}
