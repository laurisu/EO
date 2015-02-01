<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsInOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_in_offer', function($table) {
                
                    $table->engine = "InnoDB";

                    $table->increments("id");
                    
                    $table->integer('offer_id')->unsigned();
                    $table->foreign('offer_id')
                        ->references('id')->on('offers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                    
                    $table->integer('product_id')->unsigned();
                    $table->foreign('product_id')
                        ->references('id')->on('products')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
                    
                    $table->dateTime("created_at");
                    $table->dateTime("updated_at");
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("products_in_offer");
	}

}
