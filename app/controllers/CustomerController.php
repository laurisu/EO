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
    
    public function editCustomer($id) {

        return View::make('pages.customers.edit')
                        ->with('customer', Customer::find($id));
    }
    
    public function putCustomerChanges($id) {
//        print_r($id);exit();
        $validator = Validator::make(Input::all(), array(
                    'customer'          => 'required|max:255|unique:customers,customer,'.$id,
                    'contact_person'    => 'required',
                    'email'             => 'required|email',
                    'phone'             => 'required',
                    'mobile'            => 'required',
                    'web_page'          => 'required',
                    'address'           => 'required'
        ));

        if ($validator->fails()) {
//            print_r($validator->messages());exit();
            return Redirect::route('customer-edit', $id)
                            ->withErrors($validator);
        } else {
            $customer = Customer::find($id);
            $customer->customer         = Input::get('customer');
            $customer->contact_person   = Input::get('contact_person');
            $customer->email            = Input::get('email');
            $customer->phone            = Input::get('phone');
            $customer->mobile           = Input::get('mobile');
            $customer->web_page         = Input::get('web_page');
            $customer->address          = Input::get('address');
            $customer->update();

            return Redirect::route('customer-list')
                            ->with('global', 'Information about customer <b>' . $customer->customer . '</b> updated succesfully')
                            ->with('alert-class', 'alert-success');
        }
    }
    
    public function getCustomerCreator() {
        
        $user_list = DB::table('users')
                ->select(DB::raw('CONCAT(name, " ", surname) AS manager, id'))
                ->lists('manager', 'id');
        
        
        return View::make('pages.customers.create', array('user_list' => $user_list))
            ->with('users', $user_list);
    }
    
    public function postNewCustomer() {
        
        $validator = Validator::make(Input::all(), array(
            'customer'          => 'required|max:255|unique:customers',
            'contact_person'    => 'required|max:255',
            'email'             => 'required|max:100|email',
            'phone'             => 'required|digits_between:3,20',
            'mobile'            => 'required|digits_between:3,20',
            'web_page'          => 'required',
            'address'           => 'required',
            'assigned_manager'  => 'required|exists:users,id'
        ));
        
        if($validator->fails()) {
            return Redirect::route('customer-create')
                            ->withErrors($validator)
                            ->withInput(); // Returns previously typed input values
        } else {
            // Add new customer to DB
            
            // Geters
            $customer          = Input::get('customer');
            $contact_person    = Input::get('contact_person');
            $email             = Input::get('email');
            $phone             = Input::get('phone');
            $mobile            = Input::get('mobile');
            $web_page          = Input::get('web_page');
            $address           = Input::get('address');
            $user_id           = Input::get('assigned_manager');
            
            // Setters
            $create = Customer::create(array(
                'customer'          => $customer,
                'contact_person'    => $contact_person,
                'email'             => $email,
                'phone'             => $phone,
                'mobile'            => $mobile,
                'web_page'          => $web_page,
                'address'           => $address  
            )); 
            
            if ($create) {
                
                // Asociate to user
                $manager = User::find($user_id);
                $new_customer = Customer::find($create->id);
                $new_customer->user()->associate($manager);
                $new_customer->save();
                
                if ($new_customer) {
                    return Redirect::route('customer-list')
                                ->with('global', 'Customer profile of <b>' . $create->customer . '</b> has been created and <b>' . $manager->name . ' ' . $manager->surname . '</b> assigned as manager.')
                                ->with('alert-class', 'alert-success');
                }
                
                return Redirect::route('customer-list')
                                ->with('global', 'Customer profile of <b>' . $create->customer . '</b> has been created')
                                ->with('alert-class', 'alert-success');
            }
        }
    }

    public function deleteCustomer($id) {

        $customer = Customer::find($id);
        $customer->delete();

        return Redirect::route('customer-list')
                        ->with('global', 'Customer <b>' . $customer->customer . '</b> has been <b>DELETED</b> succesfully')
                        ->with('alert-class', 'alert-success');
    }

    
}