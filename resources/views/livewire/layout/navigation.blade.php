<div x-data="{ open: false }">

    <nav class="fixed top-0 left-0 w-full backdrop-blur-md bg-[#0B1F4D]/95 border-b border-blue-800 shadow-lg z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between h-16 items-center">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" class="h-8 sm:h-9">
                    <span class="text-white font-bold text-base sm:text-lg tracking-wide">
                        SIKORBA
                    </span>
                </a>

                <!-- MENU DESKTOP -->
                <div class="hidden sm:flex items-center gap-8 text-sm font-semibold">

                    <a href="{{ route('dashboard') }}"
                        class="relative text-white/90 hover:text-yellow-300 transition group">
                        Dashboard
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-yellow-400 group-hover:w-full transition-all"></span>
                    </a>

                    <a href="/presensi" class="relative text-white/90 hover:text-yellow-300 transition group">
                        Database
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-yellow-400 group-hover:w-full transition-all"></span>
                    </a>

                    <a href="/scan" class="relative text-white/90 hover:text-yellow-300 transition group">
                        Form
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-yellow-400 group-hover:w-full transition-all"></span>
                    </a>

                </div>

                <!-- USER DESKTOP -->
                <div class="hidden sm:flex items-center gap-3">

                    <div
                        class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold text-white">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <span class="text-white text-sm hidden md:block">
                        {{ auth()->user()->name }}
                    </span>

                </div>

                <!-- HAMBURGER -->
                <button @click="open = !open" class="sm:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            class="sm:hidden bg-[#0B1F4D] px-5 pb-5 space-y-4">

            <a href="{{ route('dashboard') }}" class="block text-white py-2 border-b border-blue-800">
                Dashboard
            </a>

            <a href="/presensi" class="block text-white py-2 border-b border-blue-800">
                Database
            </a>

            <a href="/scan" class="block text-white py-2 border-b border-blue-800">
                Form Kontrol
            </a>

            <div class="pt-3 border-t border-blue-800">

                <div class="text-white text-sm mb-2">
                    {{ auth()->user()->name }}
                </div>

                <a href="{{ route('profile') }}" class="block text-white py-2">
                    Profile
                </a>

                <button wire:click="logout" class="text-red-300 py-2">
                    Logout
                </button>

            </div>

        </div>

    </nav>

    <div class="h-16"></div>

</div>