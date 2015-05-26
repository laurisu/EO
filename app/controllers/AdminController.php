<?php

class AdminController extends BaseController {
    
    public function getUsersList() {
        
        $users = User::all();
//        dd($users->customers());
        return View::make('pages.users.list')
                 ->with('users', $users);
    }
    
    public function getCreateAccount() {
        return View::make('account.create');
    }

    public function postCreateAccount() {
        
        $validator = Validator::make(Input::all(), array(
                    'name'              => 'required|max:50|',
                    'surname'           => 'required|max:50|',
                    'username'          => 'required|max:20|min:3|unique:users',
                    'job_title'         => 'required|max:50|',
                    'email'             => 'required|max:50|email|unique:users',
                    'phone'             => 'required|min:6',
                    'role'              => 'required|numeric|between:0,2',
                    'profile_img'       => 'required|mimes:jpg,jpeg,png',
                    'password'          => 'required|min:6',
                    'password_again'    => 'required|same:password',
                    'active'            => 'required|numeric|between:0,1'
                        )
        );

        if ($validator->fails()) {
//            print_r($validator->messages());exit();
            return Redirect::route('account-create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = Input::get('name');
            $surname    = Input::get('surname');
            $username   = Input::get('username');
            $job_title  = Input::get('job_title');
            $email      = Input::get('email');
            $phone      = Input::get('phone');
            $password   = Input::get('password');
            $role       = Input::get('role');
            $active     = Input::get('active');
            
            $file = Input::file('profile_img');
            $path       = 'img/uploads/' . $file->getClientOriginalName();
            $file->move('img/uploads', $file->getClientOriginalName());
            
            $image = Image::make(sprintf('img/uploads/%s', $file->getClientOriginalName()))
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save();
            
            $user = User::create(array(
                        'name'      => $name,
                        'surname'   => $surname,
                        'username'  => $username,
                        'job_title' => $job_title,
                        'email'     => $email,
                        'phone'     => $phone,
                        'role'      => $role,
                        'password'  => Hash::make($password),
                        'active'    => $active,
                        'img'       => $path
            ));

            if ($user) {
                return Redirect::route('users-list')
                    ->with('global', 'The <b>' . $user->name . ' ' . $user->surname . '</b> account has been created.')
                    ->with('alert-class', 'alert-success');
            }
            return Redirect::route('users-list')
                    ->with('global', 'Something went wrong!')
                    ->with('alert-class', 'alert-warning');
            
        }
    }
    
}