<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("customers", function($table) {
            $table->engine = "InnoDB";
            
            $table->increments("id");
            
            $table->string("customer", 255);
            $table->string("contact_person", 255);
            $table->string("email", 100);
            $table->string("phone", 20);
            $table->string("mobile", 20);
            
            $table->text("web_page");
            $table->text("address");
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop("customers");
    }

}
