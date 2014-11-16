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
            'uses' => 'AccountController@postChangePassword'
        ));
    });

    /*
     * Change password (GET)
     */
    Route::get('/account/change-password', array(
        'as' => 'change-password',
        'uses' => 'AccountController@getChangePassword'
    ));

    /*
     * Sign out (GET)
     */
    Route::get('/account/sign-out', array(
        'as' => 'sign-out',
        'uses' => 'AccountController@getSignOut'
    ));

    Route::get('/user/{username}', array(
        'as' => 'user-profile',
        'uses' => 'ProfileController@user'
    ));

    Route::get('/products', array('as' => 'product-list', 'uses' => 'ProductController@getProductsList'));
    Route::get('/products/{id}', array('as' => 'product-view', 'uses' => 'ProductController@getProduct'));


    Route::get('/offer', function() {
        return View::make('pages/offer');
    });

    /*
     * ADMIN ROUTES (GET)
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
            Route::post('/account/create', array(
                'as' => 'account-create-post',
                'uses' => 'AdminController@postCreate'
            ));
        });

        /*
         * ADMIN ROUTES (GET)
         */

        /*
         * Create account (GET)
         */
        Route::get('/account/create', array(
            'as' => 'account-create',
            'uses' => 'AdminController@getCreate'
        ));

        Route::get('/admin/users', array(
            'as' => 'admin-users-list',
            'uses' => 'AdminController@getUsersList'
        ));
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
        Route::post('/sign-in', array(
            'as' => 'sign-in-post',
            'uses' => 'AccountController@postSignIn'
        ));

        /*
         * Forgot password (POST)
         */
        Route::post('account/forgot-password', array(
            'as' => 'forgot-password-post',
            'uses' => 'AccountController@postForgotPassword'
        ));
    });

    /*
     * Forgot password (GET)
     */
    Route::get('account/forgot-password', array(
        'as' => 'forgot-password',
        'uses' => 'AccountController@getForgotPassword'
    ));

    Route::get('account/recover/{code}', array(
        'as' => 'password-recover',
        'uses' => 'AccountController@getRecover'
    ));

    /*
     * Sign in (GET)
     */
    Route::get('/sign-in', array(
        'as' => 'sign-in',
        'uses' => 'AccountController@getSignIn'
    ));
});
