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
        Route::post('/products/create-product', array('as' => 'product-create-post', 'uses' => 'ProductController@postCreatedProduct'));
        Route::post('/products/product-update/{id}', array('as' => 'product-update', 'uses' => 'ProductController@putProductChanges'));
        
        /*
         * Customers page (POST)
         */
        Route::post('/customers/customer-update/{id}', array('as' => 'customer-update', 'uses' => 'CustomerController@putCustomerChanges'));
        
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
    Route::get('/products/ad_to_offer/{id}', array('as' => 'product-add-to-offer', 'uses' => 'ProductController@addToOffer'));

    /*
     * Customers page (GET)
     */
    Route::get('/customers', array('as' => 'customer-list', 'uses' => 'CustomerController@getCustomerList'));
    Route::get('/customers/view/{id}', array('as' => 'customer-view', 'uses' => 'CustomerController@getCustomer'));
    Route::get('/customers/delete/{id}', array('as' => 'customer-delete', 'uses' => 'CustomerController@deleteCustomer'));
    Route::get('/customers/edit-customer/{id}', array('as' => 'customer-edit', 'uses' => 'CustomerController@editCustomer'));

    /*
     * Customers page (GET)
     */
    Route::get('/offers', array('as' => 'offers-list', 'uses' => 'OfferControler@getOfferList'));

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
        });

        /*
         * Create account (GET)
         */
        Route::get('/account/create', array('as' => 'account-create', 'uses' => 'AdminController@getCreateAccount'));

        Route::get('/users', array('as' => 'users-list', 'uses' => 'AdminController@getUsersList'));
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
