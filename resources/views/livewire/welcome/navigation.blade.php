<div class="fixed top-0 right-0 w-full px-6 py-4 flex justify-end items-center bg-[#0B1F4D] shadow z-50">

    @auth
        <a href="{{ url('/dashboard') }}"
           class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}"
           class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Login
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="ml-3 bg-yellow-400 text-[#0B1F4D] font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 transition">
                Register
            </a>
        @endif
    @endauth

</div>