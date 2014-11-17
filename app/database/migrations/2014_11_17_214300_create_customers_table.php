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

            $table->increments("id");
            
            $table->string("customer", 60);
            $table->string("contact_person", 255);
            $table->string("email", 60);
            $table->string("phone", 20);
            $table->string("mobile", 20);
            
            $table->text("web_page");
            $table->text("address");
            
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
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
