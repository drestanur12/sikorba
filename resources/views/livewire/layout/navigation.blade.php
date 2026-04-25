<div x-data="{ open: false }">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 w-full backdrop-blur-md bg-[#0B1F4D]/95 border-b border-blue-800 shadow-lg z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" class="h-8 sm:h-9">
                    <span class="text-white font-bold">SIKORBA</span>
                </a>

                <!-- MENU -->
                <!-- MENU -->
<div class="hidden sm:flex items-center space-x-6 text-white font-semibold">
    <a href="{{ route('dashboard') }}" class="px-2 py-1 hover:text-yellow-300 transition">
        Dashboard
    </a>
    <a href="/presensi" class="px-2 py-1 hover:text-yellow-300 transition">
        Database
    </a>
    <a href="/scan" class="px-2 py-1 hover:text-yellow-300 transition">
        Form
    </a>
</div>

                <!-- ✅ USER DROPDOWN (INI YANG DITAMBAHKAN) -->
                <div class="hidden sm:flex items-center relative ml-4" x-data="{ userOpen: false }">

                    <button @click="userOpen = !userOpen"
                        class="flex items-center gap-2 text-white hover:text-yellow-300">

                        <div
                            class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <span class="hidden md:block">
                            {{ auth()->user()->name }}
                        </span>
                    </button>

                    <!-- DROPDOWN -->
                    <div x-show="userOpen" @click.outside="userOpen = false" x-transition
                        class="absolute right-0 mt-12 w-40 bg-white rounded-lg shadow-lg py-2 z-50">

                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-red-100">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

                <!-- HAMBURGER -->
                <button @click="open = !open" class="sm:hidden text-white ml-3">
                    ☰
                </button>

            </div>
        </div>

        <!-- MOBILE -->
        <div x-show="open" class="sm:hidden bg-[#0B1F4D] p-4">
            <a href="{{ route('dashboard') }}" class="block text-white py-2">Dashboard</a>
            <a href="/presensi" class="block text-white py-2">Database</a>
            <a href="/scan" class="block text-white py-2">Form</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-300 py-2">Logout</button>
            </form>
        </div>

    </nav>

    <!-- SPACER -->
    <div class="h-16"></div>

</div>