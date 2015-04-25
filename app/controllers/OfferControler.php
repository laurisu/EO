<?php

class OfferControler extends \BaseController {
        

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
                
                print_r($cart);
                
                return View::make('pages.offers.list')
                        ->with('offers', $offers->all())
                        ->with('cart', $cart->all());
                
               
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /offercontroler/create
	 *
	 * @return Response
	 */
	public function getCreateOffer()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /offercontroler
	 *
	 * @return Response
	 */
	public function postCreatedOffer()
	{
		//
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
		//
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