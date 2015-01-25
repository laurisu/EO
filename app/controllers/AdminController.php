<?php

class AdminController extends BaseController {
    
    public function getUsersList() {
        return View::make('pages.users');
    }
    
    public function getCreateAccount() {
        return View::make('account.create');
    }

    public function postCreateAccount() {
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|max:50|email|unique:users',
                    'username' => 'required|max:20|min:3|unique:users',
                    'password' => 'required|min:6',
                    'role' => 'required|max:1',
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
            $role = Input::get('role');

            $user = User::create(array(
                        'email' => $email,
                        'username' => $username,
                        'role' => $role,
                        'password' => Hash::make($password),
                        'active' => 1
            ));

            if ($user) {
                return Redirect::route('home')
                    ->with('global', 'The account has been created.')
                    ->with('alert-class', 'alert-success');
            }
        }
    }
    
}