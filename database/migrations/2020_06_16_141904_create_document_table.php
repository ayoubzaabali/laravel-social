<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('doc_user_fk');
			$table->integer('event_id')->index('doc_event_fk');
			$table->longText('path')->nullable();
			$table->longText('descr');
			$table->longText('titre');
			$table->longText('original_name');
			$table->timestamp('date_creation')->useCurrent();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document');
	}
}
