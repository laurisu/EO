<?php

class CustomerController extends BaseController {
    
    public function getCustomerList() {
        
        return View::make('pages.customers')
//                ->with('customers', Product::all())
        ->with('customers', Customer::orderBy('customer')->get());

    }
    
    public function getCustomer($id) {
        
        return View::make('pages.customer')
                ->with('title', 'Customer view page')
                ->with('customer', Customer::find($id));
        
    }
    
}