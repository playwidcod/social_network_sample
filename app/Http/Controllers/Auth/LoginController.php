<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
// use Illuminate\Support\Facades\Auth;
use Socialite;
use Auth;
use DB;
use Hash;
use Validator;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
=======

>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(){
        return view('login');
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a

    public function redirectToProvider(){

        return Socialite::driver('facebook')->redirect();
    }
    public function HandleProviderCallback(){
        // print_r("test");exit;
           $user = Socialite::with ( 'facebook' )->user ();
            // dd($user);
            // exit;
            print_r($user);
        // ->fields([
        //     'first_name', 'last_name','gender', 'email', 
        // ]);
            // dd($user);

        // $user = User::where(['email'=>$SocialUser->getEmail()])->first();
        // if($user){
        //     auth::login($user);
        //     return redirect('/');
        // }else{
        //     // return  view('register',['name'=>$SocialUser->getName(),'email'=>$SocialUser->getEmail()]);
        //     return  view('register');
        // }
    }
<<<<<<< HEAD
=======
=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
}
