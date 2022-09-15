<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginSecurity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class LoginSecurityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Generate 2FA secret key
     */

    // Function to generate secret request for 2FA
    public function generate2faSecret(Request $request)
    {
        $user = $request->user();
        // Initialise the 2FA class
        $google2fa = (app('pragmarx.google2fa'));

        // Add the secret key to the registration data
        $login_security = LoginSecurity::firstOrNew(array('user_id' => $user->id));

        // Assign the values
        $login_security->user_id = $user->id;

        // By default, it is disabled
        $login_security->google2fa_enable = 0;
        $login_security->google2fa_secret = $google2fa->generateSecretKey();

        // Save it
        $login_security->save();

        // Return with success message
        return redirect()->back()->with('success', "Secret key is generated.");
    }

    /**
     * Enable 2FA
     */

    // Function to enable the 2FA after generating the secret token
    public function enable2fa(Request $request)
    {
        // Fetch the current request user
        $user = $request->user();

        // Create an instance of Google2FA()
        $google2fa = app('pragmarx.google2fa');

        // Get the secret from the request
        $secret = $request->get('secret');

        // Validate the provided token
        $valid = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);

        // If valid, enable the 2FA
        if ($valid) {
            // Enable the 2FA Status
            $user->loginSecurity->google2fa_enable = 1;

            // Save it
            $user->loginSecurity->save();

            // Return back with success message
            return back()->with('success', "2FA is enabled successfully.");
        } else {
            // If not valid, throw an error.
            return back()->with('danger', "Invalid verification Code, Please try again.");
        }
    }

    /**
     * Disable 2FA
     */

    // Function to disable the
    public function disable2fa(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'current_password_2fa' => 'required',
        ]);

        // Check if entered password and current account password matches
        if (!(Hash::check($request->get('current_password_2fa'), $request->user()->password))) {
            $errors = new MessageBag();
            $errors->add('current_password_2fa', 'Password does not matches with your account password.');

            // Return back with error
            return redirect()->back()->withErrors($errors);
        }

        // Fetch the current request user
        $user = $request->user();

        // Disable the 2FA status
        $user->loginSecurity->google2fa_enable = 0;
        $user->loginSecurity->save();

        // Return back with success message
        return back()->with('success', "2FA is now disabled.");
    }
}
