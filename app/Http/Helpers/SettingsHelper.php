<?php

use App\Models\Setting;

if (!function_exists('set_setting')) {
    function set_setting($key, $value = null)
    {
        $setting = Setting::where('key', '=', $key)->first();
        // Key already exists, so update
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else { // Key doesnot exixts, so create new one
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $setting = Setting::where('key', '=', $key)->first();
        // Key already exists, so update
        if ($setting) {
            return $setting->value;
        }
        return null;
    }
}

if (!function_exists('delete_setting')) {
    function delete_setting($key)
    {
        $setting = Setting::where('key', '=', $key)->first();
        // Key already exists, so update
        if ($setting) {
            return $setting->delete();
        }
        return false;
    }
}
