<?php

class Offer extends Eloquent {

    protected $fillable = array(
        'user_id',
        'customer_id',
        'status'
    );
    protected $table = 'offers';
    
    // butifyer for better understanding
    public function author() {
        return $this->user();
    }
    public function recipient() {
        return $this->customer();
    }
    
    // for db query
    public function user() {
        return $this->belongsTo('User');
    }
    public function customer() {
        return $this->belongsTo('Customer');
    }

}