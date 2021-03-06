@extends('layouts.header')

@section('links')
<link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css?v=0" rel="stylesheet"> 
@endsection

@include('components.navbar')
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form action="{{ route('auth.register') }}" method="post">
                @csrf
            <input 
            type="text"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            name="email"
            placeholder="Email" />    
            <input 
                type="text"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="name"
                placeholder="name" />
            <input 
                type="password"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="password"
                placeholder="Password" />
            <input 
                type="password"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="password_confirmation"
                placeholder="Confirm Password" />
            <input 
            type="text"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            name="cellphone"
            placeholder="Cellphone" />
            @include('components.validation-errors')
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-green text-white hover:bg-green-dark focus:outline-none my-1"
            >Register</button>
            </form>
            <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Terms of Service
                </a> and 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Privacy Policy
                </a>
            </div>
        </div>

        <div class="text-grey-dark mt-6">
            Already have an account? 
            <a class="no-underline border-b border-blue text-blue" href="../login/">
                Log in
            </a>.
        </div>
    </div>
</div>

