<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
=======
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
