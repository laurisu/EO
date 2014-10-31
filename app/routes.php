<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'
));

/*
 * AUTHENTICATED GROUP (routes for users that are signed in)
 */
Route::group(array('before' => 'auth'), function() {
    
    /*
     * CSFR protection group
     */
    Route::group(array('before' => 'csfr'), function () {
        
        /*
         * Change password (POST)
         */
        Route::post('/account/change-password', array(
            'as' => 'change-password-post',
            'uses' => 'SalesRepAccountController@postChangePassword'
        ));
    });

    /*
     * Change password (GET)
     */
    Route::get('/account/change-password', array(
        'as' => 'change-password',
        'uses' => 'SalesRepAccountController@getChangePassword'
    ));

    /*
     * Sign out (GET)
     */
    Route::get('/account/sign-out', array(
        'as' => 'sign-out',
        'uses' => 'SalesRepAccountController@getSignOut'
    ));
});

/*
 * UNAUTHENTICATED GROUP (routes for guests that are not signed in)
 */
Route::group(array('before' => 'guest'), function () {

    /*
     * CSFR protection group
     */
    Route::group(array('before' => 'csfr'), function () {

        /*
         * Create account (POST)
         */
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'SalesRepAccountController@postCreate'
        ));

        /*
         * Sign in (GET)
         */
        Route::post('/sign-in', array(
            'as' => 'sign-in-post',
            'uses' => 'SalesRepAccountController@postSignIn'
        ));
    });

    /*
     * Sign in (GET)
     */
    Route::get('/sign-in', array(
        'as' => 'sign-in',
        'uses' => 'SalesRepAccountController@getSignIn'
    ));

    /*
     * Create account (GET)
     */
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'SalesRepAccountController@getCreate'
    ));
});


//Route::get('/', function()
//{
//	return View::make('pages/home');
//});
Route::get('/products', function() {
    return View::make('pages/products');
});
Route::get('/offer', function() {
    return View::make('pages/offer');
});
