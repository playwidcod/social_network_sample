<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
<<<<<<< HEAD
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true,
=======
<<<<<<< HEAD
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true,
=======
                //edited for websockets
                // 'cluster'=>env('PUSHER_APP_CLUSTER'),
                // 'encrypted'=>true
                //edited for websockets
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
         //edited for websockets
        'options' => [
            'cluster' => 'eu',
            'encrypted' => true
        ],
         //edited for websockets
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
    ],

];
