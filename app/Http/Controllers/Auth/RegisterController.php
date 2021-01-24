<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * show registration form
     */
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        return true;
    }
}
