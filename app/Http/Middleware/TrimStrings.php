<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
=======
<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
=======
use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class TrimStrings extends BaseTrimmer
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
