<x-app-layout>

    <div class="-mt-6 min-h-screen bg-cover bg-center px-4 py-6 sm:py-10" style="background-image:url('/bg-rutan.jpg')">

        <div class="max-w-3xl mx-auto space-y-5">

            <!-- HEADER -->
            <div class="bg-[#0B1F4D] text-white rounded-xl p-5 shadow">
                <h2 class="text-lg sm:text-xl font-semibold">
                    Profile Pengguna
                </h2>
                <p class="text-sm text-blue-200">
                    Kelola informasi akun dan keamanan sistem
                </p>
            </div>

            <!-- UPDATE PROFILE -->
            <div class="bg-white/90 backdrop-blur shadow-lg rounded-xl p-5 sm:p-6">
                <h3 class="font-semibold text-[#0B1F4D] mb-3 text-sm sm:text-base">
                    Informasi Akun
                </h3>

                <livewire:profile.update-profile-information-form />
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="bg-white/90 backdrop-blur shadow-lg rounded-xl p-5 sm:p-6">
                <h3 class="font-semibold text-[#0B1F4D] mb-3 text-sm sm:text-base">
                    Ubah Password
                </h3>

                <livewire:profile.update-password-form />
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="bg-white/90 backdrop-blur shadow-lg rounded-xl p-5 sm:p-6">
                <h3 class="font-semibold text-red-600 mb-3 text-sm sm:text-base">
                    Hapus Akun
                </h3>

                <livewire:profile.delete-user-form />
            </div>

        </div>

    </div>

</x-app-layout>