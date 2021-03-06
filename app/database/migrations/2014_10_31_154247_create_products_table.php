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
            
            $table->string("product_name", 255);
            
            $table->decimal("purchase_price", 8, 2);
            $table->decimal("retail_price", 8, 2);
            
            $table->text("description");
            
            $table->integer("category_id");
            
            $table->timestamps();
            $table->dateTime('deleted_at');
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
