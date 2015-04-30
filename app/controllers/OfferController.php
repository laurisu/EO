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
	public function postNewOffer() {
            
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
                    $id = $offer->id;
                    
                    if($offer){
                        foreach($offerItems as $item) {
                            $itemId = $item->id;
                            $add = OfferItem::create(array(
                                'offer_id' => $id,
                                'product_id' => $itemId
                            ));
                        }
                        Cart::destroy();
                        
                        return Redirect::route('offer-add-customer', array('id' => $id));
                    }
                }
	}
        
        /**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function getRecipientList($id) {
                
                $lastOffer = Offer::find($id);
                
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
	public function putRecipient($id) {
            
            $validator = Validator::make(Input::all(), array(
                'offer_id'  => 'required|numeric',
                'recipient' => 'required|numeric'
            ));
            
            if ($validator->fails()) {
                return Redirect::route('offer-add-customer', $id)
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $offer = Offer::find($id);
                $offer->customer_id = Input::get('recipient');
                $offer->status = 1; // 0 - products only | 1 - products + customer | 2 - sent
                $offer->update();               
                
                if($offer) {
                    return Redirect::route('view-offer', array('id' => $offer->id))
                            ->with('global', 'Recipient added. Offer is ready for sending.')
                            ->with('alert-class', 'alert-success');;
                }
                
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
                $user = User::find($offer->user_id);
                $recipient = Customer::find($offer->customer_id);
                
                return View::make('pages.offers.view-edit')
                        ->with('offer', $offer)
                        ->with('user', $user)
                        ->with('recipient', $recipient);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /offercontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteOffer($id)
	{
		$offer = Offer::find($id);
                $offer->delete();

                return Redirect::route('offers-list')
                                ->with('global', 'Offer has been <b>DELETED</b> succesfully!')
                                ->with('alert-class', 'alert-success');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /offercontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function sendOffer($id)
	{
		
                $offer = Offer::find($id);
                $recipient = Customer::find($offer->customer_id);
                $user = User::find($offer->user_id);
                
                $data = Input::all();
                $rules = array(
                    'recipient'     => 'required|exists:customers,customer',
                    'email'         => 'required|email'
                );
                
                $validator = Validator::make($data, $rules);
                
                if($validator -> passes()){
                    
                    Mail::send('emails.offer', array(
                        'user'      => $user->name,
                        'recipient' => $recipient->contact_person,
                        'offer'     => $offer->id
                    ), function($message) use ($recipient) {
                        $message->to(Input::get('email'), $recipient->contact_person)->subject('Our offer');
                    });
                    
                    $offer = Offer::find($id);
                    $offer->status = 2; // 0 - products only | 1 - products + customer | 2 - sent
                    $offer->update();   
                    
                    return Redirect::route('offers-list')
                                    ->with('global', 'Offer has been sent!')
                                    ->with('alert-class', 'alert-success');
                    
                } else {
                    return Redirect::back()->withErrors($validator);
                }
                
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