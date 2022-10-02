<?php

namespace App\Http\Controllers;

use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class ProfileController extends Controller
{
    //Function to index the backend admin profile page
    public function indexProfile()
    {
        $page['name'] = 'User Profile';
        $data['user'] = Auth::user();
        $data['user']['name'] = get_setting('user_name');
        $data['user']['bio'] = get_setting('user_bio');
        $data['user']['resume'] = get_setting('user_resume');
        $data['user']['phone'] = get_setting('user_phone');
        $data['user']['avatar'] = get_setting('user_avatar');
        $data['user']['twitter_handle'] = get_setting('user_twitter_handle');
        return view('backend.pages.settings.user.profile', compact(['page', 'data']));
    }

    //Function to update the backend admin profile info
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'max:2048'],
            'resume' => ['nullable', 'file', 'max:5620', 'mimes:pdf'],
            'twitter_handle' => ['required', 'string'],
            'phone' => ['nullable', new PhoneNumber],
        ]);

        $user = $request->user();
        set_setting('user_name', $request->get('name'));
        set_setting('user_twitter_handle', $request->get('twitter_handle'));
        set_setting('user_phone', $request->get('phone'));
        set_setting('user_bio', $request->get('bio'));
        set_setting('user_resume', upload_file($request, 'resume', 'usercontents/resume/'));
        $user->save();

        return redirect()->back()->with('success', 'Updated Successfully');
    }

    //Function to update user avatar
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'file', 'max:2048', 'mimes:png,jpg,svg,jpeg,jtif'],
        ]);
        $avatar = get_setting('user_avatar');
        if ($avatar != '/storage/usercontents/avatars/default.png' || $avatar != '/storage/usercontents/avatars/default.svg') {
            delete_file($avatar);
        }
        set_setting('user_avatar', upload_file($request, 'avatar', 'usercontents/avatars/'));
        return redirect()->back()->with('success', 'Avatar Updated Successfully.');
    }

    //Function to index the backend admin password page
    public function indexPassword()
    {
        $page['name'] = 'Password';
        $data['user'] = Auth::user();
        $data['user']['avatar'] = get_setting('user_avatar');

        $google2fa_url = "";
        $secret_key = "";

        if (isset($data['user']->loginSecurity)) {
            $google2fa = app('pragmarx.google2fa');
            $google2fa_url = $google2fa->getQRCodeInline(
                env('APP_NAME'),
                $data['user']->email,
                $data['user']->loginSecurity->google2fa_secret,
                200
            );
            $secret_key = $data['user']->loginSecurity->google2fa_secret;
        }

        $data['2fa'] = array(
            'user' => $data['user'],
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url,
        );

        return view('backend.pages.settings.user.password', compact(['page', 'data']));
    }

    //Function to update the backend admin password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully.');
        } else {
            $errors = new MessageBag();
            $errors->add('current_password', 'Current password is not correct.');
            return redirect()->back()->withInput()->withErrors($errors)->with('danger', 'Current password is not correct.');
        }
    }
}
