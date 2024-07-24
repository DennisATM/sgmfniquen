<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function portalSgm(){
        return view('login.portalSgm');
    }

    public function loginSgm(){
        return view('login.loginSgm');
    }
}
