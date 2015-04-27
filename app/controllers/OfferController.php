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
//                        Cart::destroy();
                        
                        return Redirect::route('offer-add-customer', array('offerId' => $offerId));
                    }
                }
	}
        
        /**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function getRecipientList($offerId) {
                
                $lastOffer = Offer::find($offerId);
                
                $customer_list = DB::table('customers')
                        ->orderBy('customer', 'asc')
                        ->lists('customer','id');
                return View::make('pages.offers.add-customer', array('customer_list' => $customer_list))
                        ->with('customers', $customer_list)
                        ->with('offer', $lastOffer);
            
        }
        
        /**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function putRecipient($offerId) {
            
            $validator = Validator::make(Input::all(), array(
                'offer_id'  => 'required|numeric',
                'recipient' => 'required|numeric'
            ));
            
            if ($validator->fails()) {
                return Redirect::route('offer-add-customer', $offerId)
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $offer = Offer::find($offerId);
                $offer->customer_id = Input::get('recipient');
                $offer->status = 1; // 0 - products only | 1 - products + customer | 2 - sent
                $offer->update();               
                
                return Redirect::route('view-offer')
                            ->with('global', 'Customer has been added');
            }
            
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
                $offer = Offer::find($id); 
                return View::make('pages.offers.view-edit')
                        ->with('offer', Offer::find($id));
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