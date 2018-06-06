<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\User;
use Debugbar;

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

    public function authenticate(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::validate(['email' => $email, 'password' => $password]) || Auth::validate(['name' => $email, 'password' => $password]))
        {
            $user = User::where('email', $email)->orWhere('name', $email)->first();
            Auth::loginUsingId($user->id);
            return redirect('/posts');
        }
        $messages = new MessageBag;
        $messages->add('email', trans('auth.failed'));
        return redirect('/login')->withInput()->withErrors($messages);
    }
}
