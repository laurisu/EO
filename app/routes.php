<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));

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
        Route::post('/account/change-password', array('as' => 'change-password-post', 'uses' => 'UserController@postChangePassword'));

        /*
         * Products page (POST)
         */
        Route::post('/products/create-product', array('as' => 'product-create-post', 'uses' => 'ProductController@postNewProduct'));
        Route::post('/products/product-update/{id}', array('as' => 'product-update', 'uses' => 'ProductController@putProductChanges'));
        
        /*
         * Customers page (POST)
         */
        Route::post('/customers/create-customer', array('as' => 'customer-create-post', 'uses' => 'CustomerController@postNewCustomer'));
        Route::post('/customers/customer-update/{id}', array('as' => 'customer-update', 'uses' => 'CustomerController@putCustomerChanges'));
        
        /*
         * Offers page (POST)
         */
        Route::post('/offers/offer-update/{id}', array('as' => 'add-recipient', 'uses' => 'OfferController@putRecipient'));
        Route::post('/offers/send-offer/{id}', array('as' => 'send-offer', 'uses' => 'OfferController@sendOffer'));
        
    });

    /*
     * Change password (GET)
     */
    Route::get('/account/change-password', array('as' => 'change-password', 'uses' => 'UserController@getChangePassword'));

    /*
     * Sign out (GET)
     */
    Route::get('/account/sign-out', array('as' => 'sign-out', 'uses' => 'UserController@getSignOut'));

    Route::get('/user/{username}', array('as' => 'user-profile', 'uses' => 'ProfileController@getUserProfile'));

    /*
     * Products page (GET)
     */
    Route::get('/products', array('as' => 'product-list', 'uses' => 'ProductController@getProductsList'));
    Route::get('/products/create-product', array('as' => 'product-create', 'uses' => 'ProductController@getProductCreator'));
    Route::get('/products/view/{id}', array('as' => 'product-view', 'uses' => 'ProductController@viewProduct'));
    Route::get('/products/delete/{id}', array('as' => 'product-delete', 'uses' => 'ProductController@deleteProduct'));
    Route::get('/products/edit-product/{id}', array('as' => 'product-edit', 'uses' => 'ProductController@editProduct'));
    Route::get('/products/add-to-offer/{id}', array('as' => 'add-to-offer', 'uses' => 'ProductController@addToOffer'));
    Route::get('/products/remove-from-offer/{rowid}', array('as' => 'remove-from-offer', 'uses' => 'ProductController@removeFromOffer'));

    /*
     * Customers page (GET)
     */
    Route::get('/customers', array('as' => 'customer-list', 'uses' => 'CustomerController@getCustomerList'));
    Route::get('/customers/create-customer', array('as' => 'customer-create', 'uses' => 'CustomerController@getCustomerCreator'));
    Route::get('/customers/view/{id}', array('as' => 'customer-view', 'uses' => 'CustomerController@getCustomer'));
    Route::get('/customers/delete/{id}', array('as' => 'customer-delete', 'uses' => 'CustomerController@deleteCustomer'));
    Route::get('/customers/edit-customer/{id}', array('as' => 'customer-edit', 'uses' => 'CustomerController@editCustomer'));

    /*
     * Offers page (GET)
     */
    Route::get('/offers', array('as' => 'offers-list', 'uses' => 'OfferController@getOfferList'));
    Route::get('/offers/empty-cart', array('as' => 'empty-cart', 'uses' => 'OfferController@emptyCart'));
    Route::get('/offers/create-offer', array('as' => 'offer-create-post', 'uses' => 'OfferController@postNewOffer'));
    Route::get('/offers/create-offer/{id}', array('as' => 'offer-add-customer', 'uses' => 'OfferController@getRecipientList'));
    Route::get('/offers/delete-offer/{id}', array('as' => 'offer-delete', 'uses' => 'OfferController@deleteOffer'));
    Route::get('/offers/view-offer/{id}', array('as' => 'view-offer', 'uses' => 'OfferController@getOffer'));
    Route::get('/offers/offer-accepted/{id}', array('as' => 'accept-offer', 'uses' => 'OfferController@updateStatusToAccepted'));
    Route::get('/offers/offer-rejected/{id}', array('as' => 'reject-offer', 'uses' => 'OfferController@updateStatusToRejected'));
    
    /*
     * Users / profile page (GET)
     */
    
    
    /*
     * ADMIN ONLY ROUTES
     */
    Route::group(array('before' => 'admin'), function() {

//        Route::resource('user', 'UserController');

        /*
         * CSFR protection group
         */
        Route::group(array('before' => 'csfr'), function() {

            /*
             * Create account (POST)
             */
            Route::post('/account/create', array('as' => 'account-create-post', 'uses' => 'AdminController@postCreateAccount'));
            
            /*
             * Update account (POST)
             */
            Route::post('/account/update-account/{id}', array('as' => 'account-update', 'uses' => 'AdminController@putAccountChanges'));
        });
        
        /*
         * Users list (GET)
         */
        Route::get('/users', array('as' => 'users-list', 'uses' => 'AdminController@getUsersList'));
        
        /*
         * Create account (GET)
         */
        Route::get('/account/create', array('as' => 'account-create', 'uses' => 'AdminController@getCreateAccount'));
        
        /*
         * Update account (GET)
         */
        Route::get('/account/edit-account/{id}', array('as' => 'account-edit', 'uses' => 'AdminController@editAccount'));
    });
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
         * Sign in (POST)
         */
        Route::post('/sign-in', array('as' => 'sign-in-post', 'uses' => 'UserController@postSignIn'));

        /*
         * Forgot password (POST)
         */
        Route::post('account/forgot-password', array('as' => 'forgot-password-post', 'uses' => 'UserController@postForgotPassword'));
    });

    /*
     * Forgot/recover password (GET)
     */
    Route::get('account/forgot-password', array('as' => 'forgot-password', 'uses' => 'UserController@getForgotPassword'));
    Route::get('account/recover/{code}', array('as' => 'password-recover', 'uses' => 'UserController@getRecover'));

    /*
     * Sign in (GET)
     */
    Route::get('/sign-in', array('as' => 'sign-in', 'uses' => 'UserController@getSignIn'));
});
