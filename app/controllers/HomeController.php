<?php

class HomeController extends BaseController {
    public function home() {
            
        if (Auth::check()) {
            
            $date = new DateTime;
            $date->modify('-11 month');
            $formatted_date = $date->format('Y-m-d H:i:s');
            print_r($formatted_date);
            
            $customersLastMonth = Customer::with('user')
                    ->where('created_at','>=', $formatted_date)
                    ->orderBy('created_at', 'DESC')
                    ->get();
            
            JavaScript::put([
                'offer' => Offer::all(),
                
                // select all active users with id, name, surname, 
                'user' => User::where('active','=', 1)->get(array('id','name','surname')),
                'customer' => Customer::first()
            ]);
            
            return View::make('home')
                    ->with('new_customers', $customersLastMonth);
            
        } else {
            return Redirect::route('sign-in');
        }
  
    }

}
