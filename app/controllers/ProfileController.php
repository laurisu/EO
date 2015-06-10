<?php

class ProfileController extends BaseController {

    public function getUserProfile($username) {
        $users = User::where('username', $username);

        if ($users->count()) {
            $user = $users->first();
            
            return View::make('profile.user')
                    ->with('user', $user);
        }

        return App::abort(404);
    }
    
    public function editProfile($id) {
        return View::make('profile.edit')
                ->with('user', User::find($id));
    }
    
    public function putProfileChanges($id) {
        
        $validator = Validator::make(Input::all(), array(
                    'name'              => 'required|max:50|',
                    'surname'           => 'required|max:50|',
                    'username'          => 'required|max:20|min:3|unique:users,username,'.$id,
                    'email'             => 'required|max:50|email|unique:users,email,'.$id,
                    'phone'             => 'required|min:6'
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('edit-profile', $id)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user = User::find($id);
            $user->name       = Input::get('name');
            $user->surname    = Input::get('surname');
            $user->username   = Input::get('username');
            $user->email      = Input::get('email');
            $user->phone      = Input::get('phone');
            $user->update();

            if ($user) {
                return Redirect::route('user-profile', Auth::user()->username)
                    ->with('global', 'Your profile has been edited.')
                    ->with('alert-class', 'alert-success');
            }
            return Redirect::route('users-profile', Auth::user()->username)
                    ->with('global', 'Something went wrong!')
                    ->with('alert-class', 'alert-warning');
            
        }
    }
}
