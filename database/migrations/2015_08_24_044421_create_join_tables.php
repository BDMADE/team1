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
		Schema::drop('file_member');
                Schema::drop('extension_file');
                Schema::drop('author_message');
	}

}
