<?php

class ProductController extends BaseController {
    
    public function getProductsList() {
        
        return View::make('pages.products')
                ->with('products', Product::paginate(3));
//                ->with('products', Product::orderBy('product')->get())

    }
    
    public function getProduct($id) {
        
        return View::make('pages.product')
                ->with('title', 'Product view page')
                ->with('product', Product::find($id));
        
    }
    
    public function addProduct() {
        
//        $product = new Product;
//        $product->product = 'Chair';
//        $product->description = 'Lorem Ipsum';
//        $product->purchase_price = '55.50';
//        $product->retail_price = '110.00';
//        $product->save();
//        dd('Product created');
        
        $data = array(
            'product' => 'Chair',
            'description' => 'Lorem Ipsum',
            'purchase_price' => '0',
            'retail_price' => '0',
        );
        Product::create($data);
        dd('Product added');
    }
}