<?php

namespace Tests;

<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

<<<<<<< HEAD
        Hash::setRounds(4);

=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
        return $app;
    }
}
