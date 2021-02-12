<?php

namespace App\Http\Controllers\Auth;

use App\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);
        
        if ($this->attemptLogin($request)) {
            event(new Login($request));
            return redirect()->intended();
        }
        
        return back()->with('wrongInformation', true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required']
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt($request->only('email', 'password'), $request->filled('remember'));
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('post.show');
    }
}
