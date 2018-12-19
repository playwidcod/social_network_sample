<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('datee');
            $table->string('gender');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('profile_pic');
            $table->string('terms');
            $table->string('catagories');
<<<<<<< HEAD
            // $table->string('api_token',60)->unique();
=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
