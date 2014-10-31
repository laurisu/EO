<?php

class SalesRepAccountController extends BaseController {

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

    public function getCreate() {
        return View::make('account.create');
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|max:50|email|unique:users',
                    'username' => 'required|max:20|min:3|unique:users',
                    'password' => 'required|min:6',
                    'password_again' => 'required|same:password'
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('account-create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = Input::get('email');
            $username = Input::get('username');
            $password = Input::get('password');

            // Activation code
            $code = str_random(60);

            $user = User::create(array(
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'active' => 0
            ));

            if ($user) {
                return Redirect::route('sign-in')
                                ->with('global', 'The account has been created.');
            }
        }
    }

//    public function getActivateUserAccount() {
//        $user = User::where()->where();
//        
//        if($user->count()){
//            $user = $user->first();
//            
//            // Update user Active status
//            $user->active = 1;
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
