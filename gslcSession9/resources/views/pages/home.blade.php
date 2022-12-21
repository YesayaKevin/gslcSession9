@extends('layouts.mainlayout')

@section('content')
    @auth
    {{-- As User --}}
    <div class="flex flex-col w-full space-y-4 items-center justify-center pt-40">
        <div class="flex flex-col">
            <p class="font-semibold text-2xl">Here is your data:</p>
            <p class="text-gray-500">Name: {{ auth()->user->name }}</p>
            <p class="text-gray-500">Email: {{ auth()->user->email }}</p>
        </div>
    </div>
    @else
    {{-- As Guest --}}
    <div class="flex flex-col w-full space-y-4 items-center justify-center pt-40">
        <h1 class="text-2xl font-semibold">This project is built for <span class="text-yellow-500 underline">Authentication Function</span> only.</h1>
        <p class="text-gray-500 italic">Try to use these functions:</p>
        <div class="flex space-x-4">
            <a class="bg-black border italic rounded-md px-4 py-1 text-white hover:text-yellow-400" href="{{ route('login') }}">Login</a>
            <a class="bg-black border italic rounded-md px-4 py-1 text-white hover:text-yellow-400" href="{{ route('register') }}">Register</a>
        </div>
    </div>
    @endauth
@endsection