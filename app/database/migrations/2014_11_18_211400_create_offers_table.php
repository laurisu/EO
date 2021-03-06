<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("offers", function($table) {
            $table->engine = "InnoDB";

            $table->increments("id");

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                    
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            // 0 - products only | 1 - products + customer | 2 - sent
            $table->integer('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop("offers");
    }

}
