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
        Route::post('/account/change-password', array('as' => 'change-password-post', 'uses' => 'AccountController@postChangePassword'));

        /*
         * Products page (POST)
         */
        Route::post('/products/create-product', array('as' => 'product-create-post', 'uses' => 'ProductController@postCreatedProduct'));
        Route::post('/products/product-update/{id}', array('as' => 'product-update', 'uses' => 'ProductController@putProductChanges'));
        
    });

    /*
     * Change password (GET)
     */
    Route::get('/account/change-password', array('as' => 'change-password', 'uses' => 'AccountController@getChangePassword'));

    /*
     * Sign out (GET)
     */
    Route::get('/account/sign-out', array('as' => 'sign-out', 'uses' => 'AccountController@getSignOut'));

    Route::get('/user/{username}', array('as' => 'user-profile', 'uses' => 'ProfileController@user'));

    /*
     * Products page (GET)
     */
    Route::get('/products', array('as' => 'product-list', 'uses' => 'ProductController@getProductsList'));
    Route::get('/products/create-product', array('as' => 'product-create', 'uses' => 'ProductController@getProductCreator'));
    Route::get('/products/view/{id}', array('as' => 'product-view', 'uses' => 'ProductController@viewProduct'));
    Route::get('/products/edit-product/{id}', array('as' => 'product-edit', 'uses' => 'ProductController@editProduct'));

    /*
     * Products page (GET)
     */
    Route::get('/customers', array('as' => 'customer-list', 'uses' => 'CustomerController@getCustomerList'));
    Route::get('/customers/view/{id}', array('as' => 'customer-view', 'uses' => 'CustomerController@getCustomer'));

    Route::get('/offer', function() {
        return View::make('pages/offer');
    });

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
        Route::post('/sign-in', array('as' => 'sign-in-post', 'uses' => 'AccountController@postSignIn'));

        /*
         * Forgot password (POST)
         */
        Route::post('account/forgot-password', array('as' => 'forgot-password-post', 'uses' => 'AccountController@postForgotPassword'));
    });

    /*
     * Forgot/recover password (GET)
     */
    Route::get('account/forgot-password', array('as' => 'forgot-password', 'uses' => 'AccountController@getForgotPassword'));
    Route::get('account/recover/{code}', array('as' => 'password-recover', 'uses' => 'AccountController@getRecover'));

    /*
     * Sign in (GET)
     */
    Route::get('/sign-in', array('as' => 'sign-in', 'uses' => 'AccountController@getSignIn'));
});
