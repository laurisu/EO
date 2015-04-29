<?php

class OfferItem extends Eloquent {

    protected $fillable = array(
    
        'offer_id',
        'product_id',
        'offer_price'
        
    );
    
    protected $table = 'products_in_offer';
 
    // for db query
    public function offer() {
        return $this->belongsTo('Offer');
    }
}
