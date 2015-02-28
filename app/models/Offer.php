<?php

class Offer extends Eloquent {

    protected $fillable = array(
        'customer_id',
        'manager_id'
    );
    protected $table = 'offers';
    
    // butifyer for better understanding
    public function author() {
        return $this->user();
    }
    public function receiver() {
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