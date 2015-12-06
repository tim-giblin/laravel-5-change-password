<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Remove guest from changepassword
        $this->middleware('guest', ['except' => ['getChangePassword', 'postChangePassword']]);
        // Add auth to changepassword methods
        $this->middleware('auth', ['only' => ['getChangePassword', 'postChangePassword']]);
    }

    /**
     * Display the form to change password.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangePassword()
    {
    	// change to auth.changepassword_facade for laravel/collective
        return view('auth.changepassword');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postChangePassword(Request $request)
    {
   
        // Set validation
        $this->validate($request, [
            'old_password' => 'required',
            'new_password'=>'required|confirmed|different:old_password|min:6'
        ]);

        // Compare old password
        if (!Hash::check($request->get('old_password'), $request->user()->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Old password incorrect']);
        }

        // Update current password
        $request->user()->password = bcrypt($request->get('new_password'));
        $request->user()->save();

        // If you're using sweet alert 
        // Alert::success('Your password has been changed', 'Success!!');
        
        return redirect()->back()->with('status', 'Your password has been changed');
    }
}
