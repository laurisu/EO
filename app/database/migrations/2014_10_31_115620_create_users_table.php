<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($table){
                $table->engine = "InnoDB";
                
                $table->increments('id');
                
                $table->string('name', 50);
                $table->string('surname', 50);
                $table->string('username', 20);
                $table->string('job_title', 50);
                $table->string('email', 50);
                $table->string("phone", 20);
                $table->string("img", 255);
                
                // Password related
                $table->string('password', 60);
                $table->string('password_temp', 60);
                $table->string('code', 60);
                
                // Simple user - 0 | Admin - 2
                $table->integer('role');
                
                // User status: Inactive - 0 | Actice - 1
                $table->integer('active');
                
                $table->rememberToken();
                
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
            Schema::drop('users');
	}

}
