<?php

class ProfileController extends BaseController {

    public function getUserProfile($username) {
        $users = User::where('username', '=', $username);

        if ($users->count()) {
            $user = $users->first();
            
            return View::make('profile.user')
                    ->with('user', $user);
        }

        return App::abort(404);
    }
    
}
