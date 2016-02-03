<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->integer('id')->primary();
                        $table->string('file_name');
                        $table->string('file_path');
                        $table->timestamps();
		});

                
                Schema::create('extensions', function(Blueprint $table)
		{
			$table->integer('id')->primary();
                        $table->string('file_extension');
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
		Schema::drop('files');
                Schema::drop('extensions');
	}

}
