<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    public function verify($token)
    {
        $user=User::where('remember_token',$token)->first();
        if(!is_null($user))
        {
            $user->status=1;
            $user->remember_token=NULL;
            $user->save();
            session()->flash('success','You have registered Successfully!! Login Now...');
            return redirect('/');

        }
        else
        {
            session()->flash('errors','Sorry! Token is not matched!!');
            return redirect('/');

        }
    }
}
