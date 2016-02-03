<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors', function(Blueprint $table)
		{
			$table->integer('id')->primary();
                        $table->boolean('mail_author');
                        $table->integer('message_id');                        
                        $table->foreign('message_id')->references('id')->on('messages');
                        $table->boolean('mail_send')->default(1);
                        $table->boolean('mail_draft')->default(0);
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
		Schema::drop('authors');
	}

}
