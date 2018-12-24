<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
=======
<<<<<<< HEAD
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
=======
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
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
