<?php

class ProductController extends BaseController {

    public function getProductsList() {

        return View::make('pages.products.list')
                        ->with('products', Product::paginate(7));
//                ->with('products', Product::orderBy('product')->get())
    }

    public function editProduct($id) {

        return View::make('pages.products.edit')
                        ->with('product', Product::find($id));
    }

    public function postProductChanges() {
        
    }

    public function getProductCreator() {
        return View::make('pages.products.create');
    }

    public function postCreatedProduct() {

        $validator = Validator::make(Input::all(), array(
                    'product_name' => 'required|max:60|unique:products',
                    'description' => 'required',
                    'purchase_price' => 'required',
                    'retail_price' => 'required'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('product-create')
                            ->withErrors($validator)
                            ->withInput(); // Returns previously typed input values
        } else {
            // Add new product to DB
            $product_name = input::get('product_name');
            $description = input::get('description');
            $purchase_price = input::get('purchase_price');
            $retail_price = input::get('retail_price');

            $create = Product::create(array(
                        'product_name' => $product_name,
                        'description' => $description,
                        'purchase_price' => $purchase_price,
                        'retail_price' => $retail_price
            ));
            
            if($create) {
                return Redirect::route('product-list')
                        ->with('global', 'Product has been added');
            }else {
                
            }
            
        }

//        $product = new Product;
//        $product->product = 'Chair';
//        $product->description = 'Lorem Ipsum';
//        $product->purchase_price = '55.50';
//        $product->retail_price = '110.00';
//        $product->save();
//        dd('Product created');
//        $data = array(
//            'product_name' => 'Chair',
//            'description' => 'Lorem Ipsum',
//            'purchase_price' => '0',
//            'retail_price' => '0',
//        );
//        Product::create($data);
//        dd('Product added');
    }

}
