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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate'); // route for email activation


Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
        return "Admin page";
    });

    Route::get('users/', function () {
        return view("modules.admin.users");
    });
});


Route::group(['domain' => '{account}.woodcity.app'], function () {
    Route::get('/', function ($account) {
        //
        return "Hello subdomain " . $account;
    });
});
