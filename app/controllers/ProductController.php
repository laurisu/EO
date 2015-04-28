<?php

class ProductController extends BaseController {

    public function getProductsList() {
        
//        echo '<pre>';
//        print_r($_SERVER);
//        echo '</pre>';
        
        $sortName       = Request::get('sort');
        $sortDirrection = Request::get('order');
        $search         = Request::get('search');
        $products       = DB::table('products');

        // sortName - input by user
        // sortDbName - column name in database
        switch ($sortName) {
            case 'id':
                $sortDbName = "id";
                break;
            case 'name':
                $sortDbName = "product_name";
                break;
            default:
                $sortName   = 'name';
                $sortDbName = "product_name";
                break;
        }

        if ($sortDirrection == "DESC") {
            $sortDirrection = 'DESC';
        } else {
            $sortDirrection = 'ASC';
        }

        if ($search) {
            $products->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('id', 'LIKE', '%' . $search . '%');
        }

        $productsToView = $products->orderBy($sortDbName, $sortDirrection)->paginate(30);
        $cart = Cart::content();
        
        if (!empty($cart)) {
            
        }
        
        if (Request::ajax()) {
            return View::make('pages.products.list-ajax')
                        ->with(array(
                            'products' => $productsToView,
                            'sortDirrection' => $sortDirrection,
                            'sortName' => $sortName,
                        ))->with('cart', $cart->all());
        }
        return View::make('pages.products.list')
                ->with(array(
                    'products' => $productsToView,
                    'sortDirrection' => $sortDirrection,
                    'sortName' => $sortName,
                ))->with('cart', $cart->all());
    }

    public function deleteProduct($id) {

        $product = Product::find($id);
        $product->delete();

        return Redirect::route('product-list')
                        ->with('global', 'Product <b>' . $product->product_name . '</b> has been <b>DELETED</b> succesfully')
                        ->with('alert-class', 'alert-success');
    }

    public function editProduct($id) {
        
        if (Request::ajax()) {
            return View::make('pages.products.edit-ajax')
                            ->with('product', Product::find($id));
        }
        return View::make('pages.products.edit')
                        ->with('product', Product::find($id));
    }

    public function viewProduct($id) {

        if (Request::ajax()) {
            return View::make('pages.products.view-ajax')
                            ->with('product', Product::find($id));
        }
        return View::make('pages.products.view')
                        ->with('product', Product::find($id));
    }

    public function putProductChanges($id) {
//        print_r($id);exit();
        $validator = Validator::make(Input::all(), array(
                    'product_name'      => 'required|max:255|unique:products,product_name,' . $id,
                    'description'       => 'required',
                    'purchase_price'    => 'required|numeric',
                    'retail_price'      => 'required|numeric'
        ));

        if ($validator->fails()) {
//            print_r($validator->messages());exit();
            return Redirect::route('product-edit', $id)
                            ->withErrors($validator);
        } else {
            $product = Product::find($id);
            $product->product_name      = Input::get('product_name');
            $product->description       = Input::get('description');
            $product->purchase_price    = Input::get('purchase_price');
            $product->retail_price      = Input::get('retail_price');
            $product->update();

            return Redirect::route('product-list')
                            ->with('global', 'Product <b>' . $product->product_name . '</b> updated succesfully')
                            ->with('alert-class', 'alert-success');
        }
    }

    public function getProductCreator() {
        return View::make('pages.products.create');
    }

    // HAS TO BE EDITED - FORM VALIDATION FOR FLOATING NUMBERS
    public function postNewProduct() {

        $validator = Validator::make(Input::all(), array(
                    'product_name'      => 'required|max:60|unique:products',
                    'description'       => 'required',
                    'purchase_price'    => 'required',
                    'retail_price'      => 'required'
        ));

        if ($validator->fails()) {
            return Redirect::route('product-create')
                            ->withErrors($validator)
                            ->withInput(); // Returns previously typed input values
        } else {
            // Add new product to DB
            $product_name       = Input::get('product_name');
            $description        = Input::get('description');
            $purchase_price     = Input::get('purchase_price');
            $retail_price       = Input::get('retail_price');

            $create = Product::create(array(
                        'product_name'      => $product_name,
                        'description'       => $description,
                        'purchase_price'    => $purchase_price,
                        'retail_price'      => $retail_price
            ));

            if ($create) {
                return Redirect::route('product-list')
                                ->with('global', 'Product has been added')
                                ->with('alert-class', 'alert-success');
            }
        }
    }
    
    
    // UNFINISHED
    public function addToOffer($id) {
        
        $product = Product::find($id);
        
        Cart::associate('Product')->add([
            'id'    => $product->id,
            'name'  => $product->product_name,
            'qty'   => 1,
            'price' => $product->retail_price
        ]);
        
        return Redirect::back()
                ->with('global', 'Product <b>' . $product->product_name . '</b> has been added to latest offer');
        
    }

}
