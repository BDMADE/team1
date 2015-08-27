<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inboxes', function(Blueprint $table)
		{
			$table->integer('id')->primary();
                        $table->boolean('mail_read')->default(0);
                        $table->boolean('mail_star')->default(0);
                        $table->boolean('mail_delete')->default(0);
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
		Schema::drop('inboxes');
	}

}
