<?php

class ProductController extends BaseController {
    
    public function getProductsList() {
        
        return View::make('pages.products')
//                ->with('products', Product::all())
        ->with('products', Product::orderBy('product')->get());

    }
    
    public function getProduct($id) {
        
        return View::make('pages.product')
                ->with('title', 'Product view page')
                ->with('product', Product::find($id));
        
    }
    
}