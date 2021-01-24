<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = $this->create($request->all());

        Auth::login($user);

        return redirect()->route('post.show')->with('registred', true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'cellphone' => ['numeric', 'digits:3', 'nullable'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'cellphone' => $data['cellphone'],
        ]);
    }
}
