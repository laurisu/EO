<?php

class Customer extends Eloquent {

    protected $fillable = array(
        'customer',
        'contact_person',
        'email',
        'phone',
        'mobile',
        'web_page',
        'address'
    );
    protected $table = 'customers';
    
    public function offers() {
        $this->hasMany('Offer', 'customer_id');
    }
     
    public function user() {
        return $this->belongsTo('User');
    }
}