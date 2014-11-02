<?php

class AdminController extends BaseController {
    
    public function getUsersList() {
        return View::make('pages.users');
    }
    
    
    
}