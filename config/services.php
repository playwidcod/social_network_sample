<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
  'facebook' => [ 
                'client_id' => env ( 'FB_CLIENT_ID' ),
                'client_secret' => env ( 'FB_CLIENT_SECRET' ),
                'redirect' => env ( 'FB_REDIRECT' ) 
        ],

];

 // 'facebook' => [
 //    'client_id' => env("FB_APP",'264335830907648'),         // Your GitHub Client ID
 //    'client_secret' => env('dac4c21cf7072fb36ff7ace1d018d50d'), // Your GitHub Client Secret
 //    'redirect' => 'http://localhost:8000/facebook/callback',
 //                    // env('/facebook/callback'),
 //    ],
<<<<<<< HEAD
=======
=======
];
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
