<?php

class HomeController extends BaseController {
    public function home() {
            
        if (Auth::check()) {
            
            $date = Carbon::now();
            $date->modify('-6 month');
            $formatted_date = $date->format('Y-m-d H:i:s');
            
            $newCustomers = Customer::with('user')
                    ->where('created_at','>=', $formatted_date)
                    ->orderBy('created_at', 'DESC')
                    ->get();
            
//            $offersLastSixMonths = Offer::where('created_at', '>=', $date->startOfWeek())->count();
            $offersLastSixMonths = DB::table('offers')
                    ->select(DB::raw('count(*) as user_count, status'))
                    ->where('created_at', '>=', $date->startOfWeek())
                     ->get();
            
//            dd($offersLastSixMonths);
            
            JavaScript::put([
                'offer' => Offer::all(),
                
                // select all active users with id, name, surname, 
                'user' => User::where('active', 1)->get(array('id','name','surname')),
            ]);
            
            return View::make('home')
                    ->with('new_customers', $newCustomers);
            
        } else {
            return Redirect::route('sign-in');
        }
  
    }

}
