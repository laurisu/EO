<?php

class CustomerController extends BaseController {
    
    public function getCustomerList() {
        
        return View::make('pages.customers.list')
                ->with('customers', Customer::orderBy('customer', 'ASC')->paginate(20));

    }
    
    public function getCustomer($id) {
        
        if (Request::ajax()) {
            return View::make('pages.customers.view-ajax')
                            ->with('customer', Customer::find($id));
        }
        return View::make('pages.customers.view')
                ->with('title', 'Customer view page')
                ->with('customer', Customer::find($id));
        
    }
    
}