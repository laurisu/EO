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
                    $pendingOffers  = Offer::with('author')
                            ->where('status','=',0)
                            ->orWhere('status','=',1)
                            ->orderBy('created_at', 'ASC')
                            ->get();
                    $sentOffers = Offer::with('author')
                            ->where('status','=',2)
                            ->orWhere('status','=',3)
                            ->orWhere('status','=',4)
                            ->orderBy('created_at', 'ASC')
                            ->get();
                    $cart = Cart::content();
                } else {
                    $offers  = Offer::with('author')
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('created_at', 'ASC')
                            ->get();
                    $cart = Cart::content();
                }				
                
                return View::make('pages.offers.list')
                        ->with('pendingOffers', $pendingOffers)
                        ->with('sentOffers', $sentOffers)
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
                            ->with('global', 'No products has been added to offer')
                            ->with('alert-class', 'alert-warning');
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
                            ->withInput()
                            ->with('global', 'Recipient has not been added. Please try again.')
                            ->with('alert-class', 'alert-warning');
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
                $offer      = Offer::find($id);              
                $user       = User::find($offer->user_id);
                $recipient  = Customer::find($offer->customer_id);
                $items      = OfferItem::with('product')->where('offer_id', $id)->get();
                        
                return View::make('pages.offers.view-edit')
                        ->with('offer', $offer)
                        ->with('user', $user)
                        ->with('recipient', $recipient)
                        ->with('items', $items->all());
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
		
                $offer      = Offer::find($id);
                $recipient  = Customer::find($offer->customer_id);
                $user       = User::find($offer->user_id);
                $items      = OfferItem::with('product')->where('offer_id', $id)->get();
                
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
                        'offer'     => $offer->id,
                        'items'     => $items->all()
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
                    return Redirect::back()->withErrors($validator)
                                    ->with('global', 'Offer has not been sent.')
                                    ->with('alert-class', 'alert-warning');
                }
                
	}
        
	/**
	 * Remove the specified resource from storage.
	 * GET /offercontroler
	 *
	 * @return Response
	 */
	public function emptyCart()
	{
		
                $cart = Cart::content();
 
                if(!empty($cart)) {
                    
                    Cart::destroy();
                    
                    return Redirect::back()
                        ->with('global', 'All items has been removed from prepeared offer')
                        ->with('alert-class', 'alert-info');
                }
                
                return Redirect::back()
                    ->with('global', 'No changes has been made!')
                    ->with('alert-class', 'alert-warning'); 
          
	}
        
        public function updateStatusToAccepted($id) {
            
            $offer = Offer::find($id);
            $status_accepted = 3; // ...3 - offer accepted | 4 - offer rejected
            
            $data = array(
                'offer_id'  => $offer->id,
                'status'    => $status_accepted
            );
            $rules = array(
                'offer_id'  => 'required|numeric|exists:offers,id',
                'status'    => 'required|numeric'
            );
            
            $validator = Validator::make($data, $rules);
            
            if($validator->passes()) {             
                if($offer->status == 2) {

                    $offer = Offer::find($id);
                    $offer->status = $status_accepted;
                    $offer->update();

                    return Redirect::back()
                                ->with('global', 'Offer status has been changed to - Accepted')
                                ->with('alert-class', 'alert-success');

                } elseif($offer->status <= 1) {
                    return Redirect::back()
                                ->with('global', 'This offer has not been sent, yet!')
                                ->with('alert-class', 'alert-warning');
                } elseif($offer->status == 4) {
                    return Redirect::back()
                                ->with('global', 'This offer already has been rejected')
                                ->with('alert-class', 'alert-info');
                }
            } 
            return Redirect::back()
                        ->with('global', 'Somethink went wrong')
                        ->with('alert-class', 'alert-danger');
        }
        
        public function updateStatusToRejected($id) {
            
            $offer = Offer::find($id);
            $status_rejected = 4; // ...3 - offer accepted | 4 - offer rejected
            
            $data = array(
                'offer_id'  => $offer->id,
                'status'    => $status_rejected
            );
            $rules = array(
                'offer_id'  => 'required|numeric|exists:offers,id',
                'status'    => 'required|numeric'
            );
            
            $validator = Validator::make($data, $rules);
            
            if($validator->passes()) {             
                if($offer->status == 2) {

                    $offer = Offer::find($id);
                    $offer->status = $status_rejected; 
                    $offer->update();

                    return Redirect::back()
                                ->with('global', 'Offer status has been changed to - Rejected')
                                ->with('alert-class', 'alert-success');

                } elseif($offer->status <= 1) {
                    return Redirect::back()
                                ->with('global', 'This offer has not been sent, yet!')
                                ->with('alert-class', 'alert-warning');
                } elseif($offer->status == 3) {
                    return Redirect::back()
                                ->with('global', 'This offer already has been accepted')
                                ->with('alert-class', 'alert-info');
                }
            } 
            return Redirect::back()
                        ->with('global', 'Somethink went wrong')
                        ->with('alert-class', 'alert-danger');
            
        }

}