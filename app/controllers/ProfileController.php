<?php

class ProfileController extends BaseController {

    public function getUserProfile($username) {
        $user = User::where('username', '=', $username);

        if ($user->count()) {
            $username = $user->first();
            
            return View::make('profile.user')
                    ->with('username', $username);
        }

        return App::abort(404);
    }
    
}
