<?php

class HomeController extends BaseController {
    public function home() {
            
        if (Auth::check()) {
            
            $date = new DateTime;
            $date->modify('-11 month');
            $formatted_date = $date->format('Y-m-d H:i:s');
            
            $newCustomers = Customer::with('user')
                    ->where('created_at','>=', $formatted_date)
                    ->orderBy('created_at', 'DESC')
                    ->get();
            
            JavaScript::put([
                'offer' => Offer::all(),
                
                // select all active users with id, name, surname, 
                'user' => User::where('active','=', 1)->get(array('id','name','surname')),
            ]);
            
            return View::make('home')
                    ->with('new_customers', $newCustomers);
            
        } else {
            return Redirect::route('sign-in');
        }
  
    }

}
