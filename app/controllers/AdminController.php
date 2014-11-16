<?php

class AdminController extends BaseController {
    
    public function getUsersList() {
        return View::make('pages.users');
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

            $user = User::create(array(
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'active' => 1
            ));

            if ($user) {
                return Redirect::route('sign-in')
                                ->with('global', 'The account has been created.');
            }
        }
    }
    
}