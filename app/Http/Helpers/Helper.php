<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

if (!function_exists('get_public_path')) {
    function get_public_path()
    {
        return env('APP_URL');
    }
}

if (!function_exists('get_current_path')) {
    function get_current_path()
    {
        return Request::url();
    }
}

if (!function_exists('get_storage_path')) {
    function get_storage_path()
    {
        return env('APP_URL') . 'storage/';
    }
}

if (!function_exists('isAuth')) {
    function isAuth()
    {
        return Auth::user() ? true : false;
    }
}

if (!function_exists('backend_active_menu')) {
    function backend_active_menu($val)
    {
        $uri = Request::getRequestUri();
        $uri = explode('/', explode('?', $uri)[0]);
        $val = explode('.', $val);
        array_shift($uri);
        if ($uri[0] == 'backend') {
            if (count($uri) > count($val)) {
                $uri = array_chunk($uri, count($val))[0];
            }
            return ($uri == $val);
        }

    }

}

if (!function_exists('render_backend_breadcrumb')) {
    function render_backend_breadcrumb()
    {
        $uri = Request::getRequestUri();
        $uri = explode('?', $uri);
        $uri = explode('/', $uri[0]);
        array_shift($uri);

        $ret = '<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">';

        foreach ($uri as $key => $val) {
            if ($key != 0) {
                $ret .= '<!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    ';
            }
            if ($key + 1 == count($uri)) {
                $ret .= '
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">' . ucfirst($val) . '</li>
                <!--end::Item-->';
            } else {
                $ret .= '
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">' . ucfirst($val) . '</li>
                    <!--end::Item-->';
            }
        }
        $ret .= '</ul>';
        return $ret;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($request, $name, $path)
    {
        // return $request->file('image');
        // //handle file upload
        if ($request->hasFile($name)) {
            //Get file name with extension
            $fileNameWithExt = $request->file($name)->getClientOriginalName();

            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $fileextension = $request->file($name)->getClientOriginalExtension();

            $fileNameToStore = md5($fileName . '_' . time()) . '.' . $fileextension;
            $pathToStore = $request->file($name)->storeAs('public/' . $path, $fileNameToStore);
            return "storage/" . $path . $fileNameToStore;
        }
    }
}

if (!function_exists('delete_file')) {
    function delete_file($path)
    {
        File::delete($path);
    }
}

if (!function_exists('generate_slug')) {
    function generate_slug($string)
    {
        return Str::slug($string) . '-' . rand(1000, 9999);
    }
}

function get_time_ago($time)
{
    $time_difference = time() - strtotime($time);

    if ($time_difference < 1) {return 'less than 1 second ago';}
    $condition = array(12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second',
    );

    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;

        if ($d >= 1) {
            $t = round($d);
            return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
        }
    }
}

if (!function_exists('doubleDigit')) {
    function doubleDigit($num)
    {
        if (strlen((string) $num) < 2) {
            return "0" . (string) $num;
        }
        return $num;
    }
}
