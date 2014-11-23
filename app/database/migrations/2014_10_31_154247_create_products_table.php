<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("products", function($table) {
            $table->engine = "InnoDB";

            $table->increments("id");
            
            $table->string("product", 60);
            
            $table->decimal("purchase_price", 8, 2);
            $table->decimal("retail_price", 8, 2);
            
            $table->text("description");
            
            $table->integer("category_id");
            
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop("products");
    }

}
