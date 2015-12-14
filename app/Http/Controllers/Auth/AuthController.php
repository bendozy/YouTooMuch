<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

        /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/home';


    public function facebookLogin()
    {
        $driver = 'facebook';
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback()
    {
        $driver = 'facebook';

        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return redirect('/error');
        }
 
        $authUser = $this->findOrCreateUser($user, $driver);
        dd($authUser);
        Auth::login($authUser, true);
 
        return redirect($this->redirectPath());
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $socialUser
     * @return User
     */
    private function findOrCreateUser($socialUser, $driver)
    {   
        $authUser = User::where('facebook_id', $socialUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }
        //dd($socialUser);
        return User::create([
            'username' => $socialUser->name,
            'facebook_id' => $socialUser->id,
            'avatar' => $socialUser->avatar
        ]);
    }

    protected function logout()
    {   
        Auth::logout();
    }
}
