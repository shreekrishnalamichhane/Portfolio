<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }
}
