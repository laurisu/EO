<?php

class AccountController extends BaseController {

    public function getSignIn() {
        return View::make('account.signin');
    }

    public function postSignIn() {
        $validator = Validator::make(Input::all(), array(
                    'username' => 'required',
                    'password' => 'required',
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('sign-in')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $remember = (Input::has('remember-me')) ? true : false;
            
            $auth = Auth::attempt(array(
                        'username' => Input::get('username'),
                        'password' => Input::get('password'),
                        'active' => 1 // User has to be active to sign in
                            ), $remember);

            if ($auth) {       
                // Redirect to the intended page
                return Redirect::intended('/');
            } else {
                return Redirect::route('sign-in')
                                ->with('global', 'Username/passwor incorrect, or account not activated!');
            }
        }

        return Redirect::route('sign-in')
                        ->with('global', 'There was a problem to sign you in!');
    }

    public function getSignOut() {
        Auth::logout();
        Session::flush();
        return Redirect::route('sign-in');
    }

    public function getChangePassword() {
        return View::make('account.password');
    }

    public function postChangePassword() {
        $validator = Validator::make(Input::all(), array(
                    'old_password' => 'required',
                    'password' => 'required|min:6',
                    'password_again' => 'required|same:password'
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('change-password')
                            ->withErrors($validator);
        } else {
            // change password
            $user = User::find(Auth::user()->id);

            $old_password = Input::get('old_password');
            $password = Input::get('password');

            if (Hash::check($old_password, $user->getAuthPassword())) {
                $user->password = Hash::make($password);

                if ($user->save()) {
                    return Redirect::route('home')
                                    ->with('global', 'Your password has been changed!');
                }
            } else {
                return Redirect::route('change-password')
                                ->with('global', 'Your old password is incorrect!');
            }
        }

        return Redirect::route('change-password')
                        ->with('global', 'Your password could not be changed!');
    }

    public function getForgotPassword() {
        return View::make('account.forgot');
    }

    public function postForgotPassword() {
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|email'
        ));

        if ($validator->fails()) {
            return Redirect::route('forgot-password')
                            ->withErrors($validator)
                            ->with('global', '');
        } else {
            // Change password
            $user = User::where('email', '=', Input::get('email'));

            if ($user->count()) {
                $user = $user->first();

                // Generate new random code and random password
                $code = str_random(60);
                $password = str_random(10);

                // Store new code and password in database
                $user->code = $code;
                $user->password_temp = Hash::make($password);

                // If save is succesfull we email them a view
                if ($user->save()) {

                    Mail::send('emails.auth.recover', array(
                        'link' => URL::route('password-recover', $code),
                        'username' => $user->username,
                        'password' => $password
                            ), function($message) use ($user) {
                        $message->to($user->email, $user->username)->subject('Your new password');
                    });

                    return Redirect::route('home')
                                    ->with('global', 'We have sent you a new password by email');
                }
            }
        }

        return Redirect::route('forgot-password')
                        ->with('global', 'Could not request new password');
    }

    public function getRecover($code) {
        $user = User::where('code', '=', $code)
                ->where('password_temp', '!=', '');

        if ($user->count()) {
            $user = $user->first();

            $user->password = $user->password_temp;
            $user->password_temp = '';
            $user->code = '';

            if ($user->save()) {

                return Redirect::route('home')
                                ->with('global', 'Your account has been recovered and you can sign in with yopur new password.');

                // Additional functionality here
            }
        }

        return Redirect::route('home')
                        ->with('global', 'Could not activate your user account!');
    }

//    public function getActivateUserAccount() {
//        $user = User::where()->where();
//        
//        if($user->count()){
//            $user = $user->first();
//            
//            // Update user active status
//            $user->active = 1; // Or 2 if it will have admin rights
//            
//            if($user->save()){
//                return Redirect::route('home')
//                        ->with('global', '{{ $username }} account has been activated.');
//            }
//        }
//        
//        return Redirect::route('home')
//                ->with('global', 'We could not activate your account');
//    }
}
