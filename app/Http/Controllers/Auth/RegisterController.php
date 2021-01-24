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
        $this->validateForm($request);
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'cellphone' => ['numeric', 'digits:3', 'nullable'],
        ]);
    }
}
