<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_member', function(Blueprint $table)
		{
			$table->integer('mail_id');                        
                        $table->foreign('mail_id')->references('id')->on('mails');
                        $table->integer('member_id');
                        $table->foreign('member_id')->references('id')->on('members');
		});
                
                Schema::create('file_member', function(Blueprint $table)
		{
			
                        $table->integer('file_id');                        
                        $table->foreign('file_id')->references('id')->on('files');
                        $table->integer('member_id');
                        $table->foreign('member_id')->references('id')->on('members');
		});
                
                
                Schema::create('extension_file', function(Blueprint $table)
		{       $table->integer('extension_id');
                        $table->foreign('extension_id')->references('id')->on('extensions');    
                        $table->integer('file_id');                        
                        $table->foreign('file_id')->references('id')->on('files');
                        
		});
                
             Schema::create('member_message', function(Blueprint $table)
		{	
                        $table->integer('member_id');
                        $table->foreign('member_id')->references('id')->on('members');
		
                        $table->integer('message_id');                        
                        $table->foreign('message_id')->references('id')->on('messages');
                        });   
           
                
                Schema::create('inbox_message', function(Blueprint $table)
		{	
                        $table->integer('inbox_id');
                        $table->foreign('inbox_id')->references('id')->on('inboxes');
		
                        $table->integer('message_id');                        
                        $table->foreign('message_id')->references('id')->on('messages');
                        });
                        
                Schema::create('author_message', function(Blueprint $table)
		{	
                        $table->integer('author_id');
                        $table->foreign('author_id')->references('id')->on('authors');
		
                        $table->integer('message_id');                        
                        $table->foreign('message_id')->references('id')->on('messages');
                        });
                        
           
             
	
                        
                }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mail_member');
                Schema::drop('file_member');
                Schema::drop('extension_file');
                Schema::drop('member_message');
                Schema::drop('inbox_message');
                Schema::drop('author_message');
	}

}
