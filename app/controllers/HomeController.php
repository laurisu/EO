<?php

class HomeController extends BaseController {
    public function home() {
            
        if (Auth::check()) {
            
            // Sets the date back for 5 months since first day of this month
            $dt1 = Carbon::now();
            $first_day = $dt1->startOfMonth();
            $offer_stats_date = $first_day->subMonths(5);
            
            
            // Offer status
            // 0 - products only 
            // 1 - products + customer 
            // 2 - sent, but no feedback received
            // 3 - offer accepted 
            // 4 - offer rejected
            
            // Selects and counts all offers with status - 2 (sent, but no feedback received)
            $sent_ofrs = DB::table('offers')
                    ->where('updated_at', '>=', $offer_stats_date->format('Y-m-d H:i:s'))
                    ->where('status', 2)
                    ->select(DB::raw('MONTH( updated_at ) as date , status') , DB::raw('count(*) as count'))
                    ->groupBy(DB::raw('date, status'))
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            
            // If there is no
            if(!empty($sent_ofrs[0]->count)){$sent1 = $sent_ofrs[0]->count;}else{$sent1 = 0;};
            if(!empty($sent_ofrs[1]->count)){$sent2 = $sent_ofrs[1]->count;}else{$sent2 = 0;};
            if(!empty($sent_ofrs[2]->count)){$sent3 = $sent_ofrs[2]->count;}else{$sent3 = 0;};
            if(!empty($sent_ofrs[3]->count)){$sent4 = $sent_ofrs[3]->count;}else{$sent4 = 0;};
            if(!empty($sent_ofrs[4]->count)){$sent5 = $sent_ofrs[4]->count;}else{$sent5 = 0;};
            if(!empty($sent_ofrs[5]->count)){$sent6 = $sent_ofrs[5]->count;}else{$sent6 = 0;};
            $sentData = array($sent1, $sent2, $sent3, $sent4, $sent5, $sent6);
            
            // Selects and counts all offers with status - 3 (sent and accepted)
            $accepted = DB::table('offers')
                    ->where('updated_at', '>=', $offer_stats_date->format('Y-m-d H:i:s'))
                    ->where('status', 3)
                    ->select(DB::raw('MONTH( updated_at ) as date , status') , DB::raw('count(*) as count'))
                    ->groupBy(DB::raw('date, status'))
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            
            if(!empty($accepted[0]->count)){$acc1 = $accepted[0]->count;}else{$acc1 = 0;};
            if(!empty($accepted[1]->count)){$acc2 = $accepted[1]->count;}else{$acc2 = 0;};
            if(!empty($accepted[2]->count)){$acc3 = $accepted[2]->count;}else{$acc3 = 0;};
            if(!empty($accepted[3]->count)){$acc4 = $accepted[3]->count;}else{$acc4 = 0;};
            if(!empty($accepted[4]->count)){$acc5 = $accepted[4]->count;}else{$acc5 = 0;};
            if(!empty($accepted[5]->count)){$acc6 = $accepted[5]->count;}else{$acc6 = 0;};
            $accData = array($acc1, $acc2, $acc3, $acc4, $acc5, $acc6);
            
            // Selects and counts all offers with status - 4 (sent and rejected)
            $rejected = DB::table('offers')
                    ->where('updated_at', '>=', $offer_stats_date->format('Y-m-d H:i:s'))
                    ->where('status', 4)
                    ->select(DB::raw('MONTH( updated_at ) as date , status') , DB::raw('count(*) as count'))
                    ->groupBy(DB::raw('date, status'))
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            
            if(!empty($rejected[0]->count)){$rej1 = $rejected[0]->count;}else{$rej1 = 0;};
            if(!empty($rejected[1]->count)){$rej2 = $rejected[1]->count;}else{$rej2 = 0;};
            if(!empty($rejected[2]->count)){$rej3 = $rejected[2]->count;}else{$rej3 = 0;};
            if(!empty($rejected[3]->count)){$rej4 = $rejected[3]->count;}else{$rej4 = 0;};
            if(!empty($rejected[4]->count)){$rej5 = $rejected[4]->count;}else{$rej5 = 0;};
            if(!empty($rejected[5]->count)){$rej6 = $rejected[5]->count;}else{$rej6 = 0;};
            $rejData = array($rej1, $rej2, $rej3, $rej4, $rej5, $rej6);
            
            $users = User::with('offers')->with('customers')->get();
            $user_names = array();
            $user_offer_count = array();
            $user_customer_count = array();
            
            foreach ($users as $user) {
                $user_names[]           = $user->name . ' ' . $user->surname;
                $user_offer_count[]     = $user->offers()->count();
                $user_customer_count[]  = $user->customers()->count();
//                $user_offer_coun[$user->id] = $user->offers()->count();
            }
            
            // 
            JavaScript::put([
                // Sent offer data for last 6 months
                'sentData'      => $sentData,
                'accData'       => $accData,
                'rejData'       => $rejData,
                
                // User statistics - total offer count, total customer count
                'users'         => $user_names,
                'offerTotal'    => $user_offer_count,
                'customerTotal' => $user_customer_count,
            ]);
            
            // Sets the date back to 3 months from today
            $dt2 = Carbon::now();
            $cust_stats_date = $dt2->subMonths(3);
            
            // Gathering list of customers that has been added in last 90 days. 
            $newCustomers = Customer::with('user')
                    ->where('created_at','>=', $cust_stats_date->format('Y-m-d H:i:s'))
                    ->orderBy('created_at', 'DESC')
                    ->get();
            
            return View::make('home')
                    ->with('new_customers', $newCustomers);
            
        } else {
            return Redirect::route('sign-in');
        }
  
    }

}
