<?php

class OfferController extends \BaseController {
        

	/**
	 * Display a listing of the resource.
	 * GET /offercontroler
	 *
	 * @return Response
	 */
	public function getOfferList()
	{
            
                if (Auth::user()->isAdmin()) {
                    $offers  = Offer::all();
                    $cart = Cart::content();
                } else {
                    $offers  = Offer::with('author')->where('user_id', Auth::user()->id)->get();
                    $cart = Cart::content();
                }				
                
//                print_r($cart);
                
                return View::make('pages.offers.list')
                        ->with('offers', $offers->all())
                        ->with('cart', $cart->all());
                
               
	}

        /**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function postNewOffer()
	{
		$offerItems = Cart::content();
                
                if(empty($offerItems)) {
                    return Redirect::route('offers-list')
                            ->with('global', 'No products has been chosen');
                } else {
                    
                    $offer = Offer::create(array(
                        'user_id' => Auth::user()->id,
                        'customer_id' => NULL,
                        'status' => 0
                    ));
                    $offerId = $offer->id;
                    
                    if($offer){
                        foreach($offerItems as $item) {
                            $itemId = $item->id;
                            $add = OfferItem::create(array(
                                'offer_id' => $offerId,
                                'product_id' => $itemId
                            ));
                        }
                        Cart::destroy();
                        
                        return Redirect::route('offer-add-customer');
                    }
                }
	}
        
        /**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function addRecipient() {
            
                
            
        }
        
	/**
	 * Display the specified resource.
	 * GET /offercontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getOffer($id)
	{
		if (Auth::user()->isAdmin()) {
                    $offers  = Offer::all();
                } else {
                    $offers  = Offer::with('author')->where('user_id', Auth::user()->id)->get();
                }				
     
                return View::make('pages.offers.add-customer')
                        ->with('offers', $offers->all());
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /offercontroler/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEditOffer($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /offercontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /offercontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}