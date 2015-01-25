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
                   'product_name' => 'Product 1', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 2', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 3', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor nisl tristique ullamcorper elementum. Curabitur semper elit eget sapien consequat fringilla. Fusce consectetur luctus ante, vel luctus diam mattis in. Ut quis eros non orci aliquam ultrices non ac urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tristique semper ex. Integer tincidunt interdum dolor a sodales. Curabitur a rutrum ligula, et sollicitudin est. Proin ultrices placerat turpis, non finibus nunc imperdiet vitae.' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 4', 
                   'purchase_price' => 2.58,
                   'retail_price' => 30.8, 
                   'description' => 'akasda sjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 5', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor nisl tristique ullamcorper elementum. Curabitur semper elit eget sapien consequat fringilla. Fusce consectetur luctus ante, vel luctus diam mattis in. Ut quis eros non orci aliquam ultrices non ac urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tristique semper ex. Integer tincidunt interdum dolor a sodales. Curabitur a rutrum ligula, et sollicitudin est. Proin ultrices placerat turpis, non finibus nunc imperdiet vitae.' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 6', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor nisl tristique ullamcorper elementum. Curabitur semper elit eget sapien consequat fringilla. Fusce consectetur luctus ante, vel luctus diam mattis in. Ut quis eros non orci aliquam ultrices non ac urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tristique semper ex. Integer tincidunt interdum dolor a sodales. Curabitur a rutrum ligula, et sollicitudin est. Proin ultrices placerat turpis, non finibus nunc imperdiet vitae.' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 7', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 8', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 9', 
                   'purchase_price' => 20.5,
                   'retail_price' => 50.8, 
                   'description' => 'aksjhasdkj kajsdhasdkjhdsa akjsdhasdkjh' 
                ));
                
                Product::create(array(
                   'product_name' => 'Product 10', 
                   'purchase_price' => 1000.5,
                   'retail_price' => 1090.00, 
                   'description' => 'Lorem Ipsum' 
                ));
                
	}

}