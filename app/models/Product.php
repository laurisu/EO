<?php

class Product extends Eloquent {

//    protected $fillable = array(
//        'product',
//        'description',
//        'purchase_price',
//        'retail_price'
//    );
    
//    $guarded masīvs norāda kurus laukus nevar pievienot no mass assignment
    protected $guarded = ['description'];
//    protected $table = 'products';

}
