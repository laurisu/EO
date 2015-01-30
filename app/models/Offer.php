<?php

class Offer extends Eloquent {

    protected $fillable = array(
        'customer_id',
        'manager_id',
        'offer'
    );
    protected $table = 'customers';

}