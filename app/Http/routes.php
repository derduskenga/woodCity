<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate'); // route for email activation


Route::get('/', 'IndexController@index')->name('landing-page');


Route::get('/home', 'HomeController@index')->name('homepage');

Route::get('/profile', 'ClientController@index')->name('profile.show');

Route::get('/product/{id}', 'ProductController@show')->name('product.detail');


Route::group(['middleware'=>'auth', 'prefix' => 'shop'], function () {
    
    // TODO: added the auth on specific route
    
    // CART ROUTES
    Route::get('/cart', 'CartController@getIndex')->name('cart.index');
    Route::post('/cart/add', 'CartController@postAddToCart')->name('cart.add');
    Route::get('/cart/delete/{id}', 'CartController@getDelete')->name('cart.delete');
    
    // CHECKOUT ROUTE
    Route::get('checkout', 'CartController@getCheckout')->name('checkout');
    
    // Order ROUTES
    Route::post('/order', 'OrderController@store')->name('order.add');
    Route::get('/user/orders', 'OrderController@index')->name('client.orders');
    
});




Route::group(['middleware' => 'auth', 'prefix' => 'client'], function () {


    Route::post('/update', 'ClientController@update')->name('client.profile.update');

    Route::post('/address/add', 'AddressController@store')->name('client.address.add');

    // Route::get('/orders', 'OrderController@index')->name('client.orders');

});


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
        return view('home');
    });

    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');

});


Route::group(['domain' => '{account}.woodcity.app'], function () {
    Route::get('/', function ($account) {
        //
        return "Hello subdomain " . $account;
    });
});




Route::get('/redirect/{provider}', 'SocialAuthController@redirect')->name('social.redirect');

Route::get('/callback/{provider}', 'SocialAuthController@callback')->name('social.callback');