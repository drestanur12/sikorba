@extends('layouts.app')

@section('content')

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4">

            <div class="bg-white shadow-xl rounded-2xl p-6">

                <!-- Judul -->
                <h3 class="text-2xl font-bold text-center text-blue-600 mb-2">
                    📷 scan presensisensi Kontrol
                </h3>
                <p class="text-center text-gray-500 mb-6">
                    Izinkan kamera lalu arahkan ke QR Code lokasi jaga
                </p>

                <!-- Scanner -->
               <div class="border-2 border-dashed border-blue-300 rounded-xl p-3 mb-8">
                    <div id="reader" style="width:100%; height:350px;"></div>
                </div>

                <!-- Sound Beep -->
                <audio id="beep" src="https://www.soundjay.com/buttons/sounds/beep-07.mp3"></audio>

                <!-- Status -->
                <<div class="text-center mt-4 mb-6">
                    <span class="text-sm text-gray-600">Status:</span>
                    <div id="status" class="font-semibold text-yellow-500">
                        Menunggu scan QR...
                    </div>
                </div>

                <!-- Form Presensi -->
                <div class="grid md:grid-cols-2 gap-4">

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Nama Petugas
                        </label>
                        <input type="text" id="nama"
                            placeholder="Masukkan Nama Petugas"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <!-- Kontrol -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Kontrol Jaga
                        </label>
                        <select id="kontrol" class="w-full border rounded-lg p-2">
                            <option value="">-- Pilih Kontrol --</option>
                            <option value="Rupam 1">Rupam 1</option>
                            <option value="Rupam 2">Rupam 2</option>
                            <option value="Rupam 3">Rupam 3</option>
                            <option value="Rupam 4">Rupam 4</option>
                            <option value="Pejabat Struktural">Pejabat Struktural</option>
                            <option value="Staf Piket Siang">Staf Piket Siang</option>
                            <option value="Staf Piket Malam">Staf Piket Malam</option>
                        </select>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Lokasi Jaga (Dari QR)
                        </label>
                        <input type="text" id="lokasi" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <!-- Foto Dokumentasi (SATU SAJA, sudah diperbaiki) -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold mb-1">
                            Foto Dokumentasi Presensi
                        </label>
                        <input type="file" id="foto" accept="image/*" class="w-full border rounded-lg p-2 bg-gray-50"
                            onchange="previewFoto(event)">
                            <div class="mt-3 text-center">
                                <img id="preview" class="hidden mx-auto rounded-lg shadow w-40 h-40 object-cover border">
                            </div>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Tanggal Jaga
                        </label>
                        <input type="text" id="tanggal" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <!-- Waktu -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Waktu Presensi
                        </label>
                        <input type="text" id="waktu" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                </div>

                <!-- Tombol -->
                <div class="mt-6 text-center">
                    <button onclick="kirimPresensi()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                        ✔️ Sudah Presensi
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Library QR -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8"></script>

    <script>
let hasilScan = "";

// Set tanggal & waktu otomatis
function setDateTime() {
    const now = new Date();
    document.getElementById("tanggal").value = now.toLocaleDateString('id-ID');
    document.getElementById("waktu").value = now.toLocaleTimeString('id-ID');
}
setDateTime();

// ✅ PREVIEW FOTO (HARUS DI LUAR)
function previewFoto(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("preview");

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove("hidden");
    }
}

// Saat scan berhasil
function onScanSuccess(decodedText) {
    hasilScan = decodedText;
    document.getElementById("lokasi").value = decodedText;

    document.getElementById("beep").play();

    document.getElementById("status").innerText = "Scan Berhasil!";
    document.getElementById("status").className = "font-semibold text-green-600";
}

// Kirim presensi
function kirimPresensi() {
    const nama = document.getElementById("nama").value;
    const foto = document.getElementById("foto").files[0];
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (nama === "") {
        alert("Nama petugas wajib diisi!");
        return;
    }

    if (hasilScan === "") {
        alert("Silakan scan QR lokasi jaga terlebih dahulu!");
        return;
    }

    navigator.geolocation.getCurrentPosition(function (position) {

        let gps = position.coords.latitude + "," + position.coords.longitude;

        let formData = new FormData();
        formData.append("nama", nama);
        formData.append("lokasi_jaga", hasilScan);
        formData.append("gps", gps);

        if (foto) {
            formData.append("foto", foto);
        }

        fetch("/presensi/store", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById("status").innerText = data.message;
            document.getElementById("status").className = "font-semibold text-green-600";

            alert("Presensi berhasil disimpan!");

            window.location.href = "{{ route('presensi') }}";
        })
        .catch(err => {
            document.getElementById("status").innerText = "Gagal simpan ke database!";
            console.log(err);
        });

    }, function () {
        alert("Izin lokasi ditolak!");
    });
}

// Scanner
document.addEventListener("DOMContentLoaded", function () {
    const html5QrCodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: 250 },
        false
    );
    html5QrCodeScanner.render(onScanSuccess);
});
</script>

@endsection