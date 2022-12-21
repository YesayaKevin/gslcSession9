@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col justify-center items-center min-h-full w-full mt-24">
    <form action="{{ route('login') }}" method="" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-xl">Please Insert your email,</h1>
        @csrf
        <input class="border p-4" type="email" name="email" required autofocus value="{{old ('email')}}" placeholder="Email">
        {{-- @if (session()->has('success'))
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
        @endif --}}
        <a class="w-full text-center bg-yellow-300 rounded-md py-2 hover:font-bold" href="{{ route('verification') }}">Insert Verification Code</a>
    </form>
</div>
@endsection

{{-- Authentication
    1. Forgot Password
    2. Validation Forgot Password
    --}}