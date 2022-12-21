@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col justify-center items-center min-h-full w-full mt-24">
    <form action="{{ route('login') }}" method="post" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-xl">Please Sign In,</h1>
        @csrf
        <input class="border p-4" type="email" name="email" required autofocus value="{{old ('email')}}" placeholder="Email">
        <input class="border p-4" type="password" name="password" id="floatingPassword" placeholder="Password">
        <label for="remember_me"><input type="checkbox" value="remember-me" name="remember_me"> Remember me</label>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show text-red-500" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <button class="w-full bg-yellow-300 rounded-md py-2 hover:font-bold" type="submit">Login</button>
        <a href="{{ route('forgotPassword') }}" class="text-gray-500 hover:underline self-end">Forgot Password?</a>
        <p class="self-center">Don't have account? <span><a class="text-yellow-500 hover:underline" href="{{ route('register') }}">Sign up here!</a></span></p>
    </form>
    <p class="mt-4 text-gray-500">Or sign up with</p>
    <div class="flex mt-4 space-x-4">
        <a href="auth/google" class="rounded-full p-2 w-12 h-12 border-white hover:shadow-xl shadow-md"><img src="{{ URL::asset('google.png') }}" alt="google.png"></a>   
        <a href="auth/github" class="rounded-full p-2 w-12 h-12 border-white hover:shadow-xl shadow-md"><img src="{{ URL::asset('github.png') }}" alt="github.png"></a>
    </div>
</div>
@endsection

{{-- Authentication
    1. Forgot password
    --}}