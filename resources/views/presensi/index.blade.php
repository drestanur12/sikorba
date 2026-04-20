@extends('layouts.app')

@section('content')

    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white p-4 sm:p-6 shadow rounded-xl">

                <!-- HEADER -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-4">
                    <h2 class="text-lg sm:text-xl font-bold">
                        Data Presensi
                    </h2>

                    <a href="/scan"
                        class="inline-block w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Scan Presensi
                    </a>
                </div>

                <!-- TABEL RESPONSIVE -->
                <div class="overflow-x-auto rounded-xl shadow">
                    <table class="min-w-[700px] w-full border text-xs sm:text-sm">

                        <!-- HEADER -->
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border px-2 py-2 sm:px-4">Nama</th>
                                <th class="border px-2 py-2 sm:px-4">Lokasi</th>
                                <th class="border px-2 py-2 sm:px-4">Waktu</th>
                                <th class="border px-2 py-2 sm:px-4">GPS</th>
                                <th class="border px-2 py-2 sm:px-4 text-center">Foto</th>
                            </tr>
                        </thead>

                        <!-- DATA -->
                        <tbody>
                            @foreach($data as $d)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="border px-2 py-2 sm:px-4">
                                        {{ $d->nama }}
                                    </td>

                                    <td class="border px-2 py-2 sm:px-4">
                                        {{ $d->lokasi_jaga }}
                                    </td>

                                    <td class="border px-2 py-2 sm:px-4">
                                        {{ $d->waktu }}
                                    </td>

                                    <td class="border px-2 py-2 sm:px-4">
                                        {{ $d->gps }}
                                    </td>

                                    <!-- FOTO -->
                                    <td class="border px-2 py-2 sm:px-4 text-center">
                                        @if($d->foto)
                                            <a href="{{ asset('storage/' . $d->foto) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $d->foto) }}"
                                                    class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded-lg shadow mx-auto hover:scale-110 transition duration-300">
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-xs">
                                                Tidak ada
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection