<?php

class UserController extends BaseController {

    public function getSignIn() {
        return View::make('account.signin');
    }

    public function postSignIn() {
        $validator = Validator::make(Input::all(), array(
                    'username' => 'required|exists:users,username',
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
                $user = User::find(Auth::user()->id);
                $user->last_signin = Carbon::now()->toDateTimeString();
                $user->update();

                // Redirect to the intended page
                return Redirect::intended('/');
            } else {
                return Redirect::route('sign-in')
                                ->with('global', 'Username/passwor incorrect, or account not activated!')
                                ->with('alert-class', 'alert-danger');
            }
        }

        return Redirect::route('sign-in')
                        ->with('global', 'There was a problem to sign you in!')
                        ->with('alert-class', 'alert-warning');
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
                                    ->with('global', 'Your password has been changed!')
                                    ->with('alert-class', 'alert-success');
                }
            } else {
                return Redirect::route('change-password')
                                ->with('global', 'Your old password is incorrect!')
                                ->with('alert-class', 'alert-warning');
            }
        }

        return Redirect::route('change-password')
                        ->with('global', 'Your password could not be changed!')
                        ->with('alert-class', 'alert-danger');
    }

    public function getForgotPassword() {
        return View::make('account.forgot');
    }

    public function postForgotPassword() {
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|email|exists:users,email'
        ));

        if ($validator->fails()) {
            return Redirect::route('forgot-password')
                            ->withErrors($validator)
                            ->with('global', 'There is no one registered with provided email address')
                            ->with('alert-class', 'alert-warning');
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
                                    ->with('global', 'We have sent you a new password by email')
                                    ->with('alert-class', 'alert-info');
                }
            } else {
                return Redirect::route('forgot-password')
                                ->with('global', 'No such email in database')
                                ->with('alert-class', 'alert-danger');
            }
        }

        return Redirect::route('forgot-password')
                        ->with('global', 'Could not request new password')
                        ->with('alert-class', 'alert-danger');
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
                                ->with('global', 'Your account has been recovered and you can sign in with yopur new password.')
                                ->with('alert-class', 'alert-succes');

                // Additional functionality here
            }
        }

        return Redirect::route('home')
                        ->with('global', 'Could not activate your user account!')
                        ->with('alert-class', 'alert-danger');
    }

}
