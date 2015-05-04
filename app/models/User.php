<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $fillable = array(
        'name',
        'surname',
        'username',
        'job_title',
        'email',
        'phone',
        'img',
        'password',
        'pasword_temp',
        'code',
        'role',
        'active',
        'remember_token'
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function isSimpleUser() {
        return $this->role == 0;
    }

    public function isAdmin() {
        return $this->role == 2;
    }
    
    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        return $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function customers() {
        return $this->hasMany('Customer', 'user_id');
    }

    public function offers() {
        return $this->hasMany('Offer', 'user_id');
    }

}
