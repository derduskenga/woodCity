<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
        'client_id' => '1283795694997697',
        'client_secret' => 'f420cff74dd95a1068fcd12ba65cb53b',
        'redirect' => 'http://woodcity.app/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'Nob5lY05mQmPqy1aSOvcsA3OW',
        'client_secret' => 'elqviaMoZ1rT1yk6EMWEjAkDiOth85mT1rEuFfiT8kelLSNp7n',
        'redirect' => 'http://woodcity.app/callback/twitter',
    ],

    'google' => [
        'client_id' => '462357463977-2a83pkjp6thb0ijcl1dk0ne6re3d0v7l.apps.googleusercontent.com',
        'client_secret' => 'l7XOziNEZ_bmIutnlcfk9bCD',
        'redirect' => 'http://woodcity.app/callback/google',
    ],

];
