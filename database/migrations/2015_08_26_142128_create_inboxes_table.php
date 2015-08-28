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
                        $table->integer('member_id');
                        $table->foreign('member_id')->references('id')->on('members');
                        $table->integer('message_id');                        
                        $table->foreign('message_id')->references('id')->on('messages');
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
