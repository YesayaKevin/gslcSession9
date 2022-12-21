<nav class="bg-black px-12 py-4 sticky top-0 w-full flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-xl italic text-white font-bold hover:text-yellow-400">GSLC9</a>
    {{-- User --}}
    @auth
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="text-white hover:font-bold">Logout</button>
    </form>
    {{-- Guest --}}
    @else
    <div class="flex space-x-4">
        <a href="{{ route('login') }}" class="border italic border-white rounded-md px-4 py-1 text-white hover:border-yellow-400">Login</a>
        <a href="{{ route('register') }}" class="border italic border-white rounded-md px-4 py-1 text-white hover:border-yellow-400">Register</a>
    </div>
    @endauth
</nav>  