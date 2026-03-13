<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('pages.login');
    }
    public function signup() {
        return view('pages.signup');
    }
    public function forgot_password() {
        return view('pages.forgot-password');
    }
}
