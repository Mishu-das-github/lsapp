<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use Auth;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user=User::where('email',$request->email)->first();
        

        if(!is_null($user))
        {
            if($user->status==1)
            {
    
                //login this user
                if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
                {
                    //Log him now
                    return redirect()->intended(route('index'));
                   
                }
                else
                {
                    session()->flash('errorsnew','Email or password is incorrect!');
                    return redirect('login');
                }
    
            }
            
            else
            {
                $user->notify(new VerifyRegistration($user));
                session()->flash('success','A new confirmation mail has sent to you...Please check and confirm your email');
                return redirect('/');
            }
        }
        else
        {
            session()->flash('errorsnew','Email or Password is incorrect!!');
                return redirect('/login');
        }

}

}
