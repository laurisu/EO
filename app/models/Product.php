<?php

class Product extends Eloquent {

    protected $fillable = array(
        'product',
        'description',
        'purchase_price',
        'retail_price'
    );
    protected $table = 'products';

}
