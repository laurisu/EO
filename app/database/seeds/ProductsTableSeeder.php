<?php

class ProductsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('products')->delete();
                
                Product::create(array(
                   'product' => 'Table', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product' => 'Table 1', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product' => 'Table with one leg', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajaskjh akjdashdsa asdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product' => 'Bulb', 
                   'purchase_price' => 2.58,
                   'retail_price' => 30.8, 
                   'description' => 'akasda sjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product' => 'Table 3', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
	}

}