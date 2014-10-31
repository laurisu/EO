<?php

class HomeController extends BaseController {
    public function home() {
        
//        echo $user = User::find(1)->username;
        
        Mail::send('emails.auth.test', array('name' => 'Lauris'), function($message){
            $message->to('lauris.ulpe@gamil.com', 'Lauris Ulpe')->subject('test email');
            
        });
        
        return View::make('home');
    }
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
}
