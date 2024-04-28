<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->foreign('event_id', 'doc_event_fk')->references('id')->on('event')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'doc_user_fk')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->dropForeign('doc_event_fk');
			$table->dropForeign('doc_user_fk');
		});
	}
}
