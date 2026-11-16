<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Alat Camping - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F5F7F6] text-gray-800 flex min-h-screen">

    <aside class="w-64 bg-[#1E3A2F] text-white flex flex-col justify-between p-5 shrink-0">
        <div>
            <div class="flex flex-col items-center py-4 mb-6 border-b border-white/10">
                <svg class="w-12 h-12 text-white mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 20l6-10 4 6 5-8 3 12H3z" />
                </svg>
                <span class="text-xl font-bold tracking-wide">Kemah.in</span>
                <span class="text-[11px] text-gray-300">Sewa Perlengkapan Camping</span>
            </div>

            <nav class="space-y-2 text-sm">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 transition">
                    <span>🏠</span> Dashboard
                </a>
                <a href="/penyewaan" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#4A7C59] text-white font-semibold shadow-sm">
                    <span>🎒</span> Penyewaan
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 transition">
                    <span>🔄</span> Pengembalian
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 transition">
                    <span>⛺</span> Data Barang
                </a>
            </nav>
        </div>

        <div class="border-t border-white/10 pt-4">
            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:text-white transition">
                <span>🚪</span> Keluar
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col">

        <header class="bg-white h-16 px-8 flex items-center justify-between border-b border-gray-200">
            <button class="text-gray-500 hover:text-gray-800 text-xl">☰</button>
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=Penyewa+Kemah&background=1E3A2F&color=fff" alt="User" class="w-8 h-8 rounded-full">
                <span class="text-sm font-medium text-gray-700">Halo, Penyewa ▾</span>
            </div>
        </header>

        <div class="p-8 max-w-6xl w-full mx-auto">
            <h1 class="text-2xl font-bold text-gray-900">Peminjaman Alat Camping</h1>
            <p class="text-sm text-gray-500 mt-1">Pilih barang yang ingin disewa dan atur durasi peminjaman</p>

            <div class="flex items-center justify-center my-8 max-w-xl mx-auto">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full bg-[#4A7C59] text-white flex items-center justify-center font-bold text-sm">1</div>
                    <span class="text-xs font-semibold text-gray-800 mt-2">Pilih Barang</span>
                </div>
                <div class="flex-1 h-1 bg-[#4A7C59] mx-2 -mt-5"></div>
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-sm">2</div>
                    <span class="text-xs text-gray-500 mt-2">Data & Keranjang</span>
                </div>
                <div class="flex-1 h-1 bg-gray-300 mx-2 -mt-5"></div>
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-sm">3</div>
                    <span class="text-xs text-gray-500 mt-2">Konfirmasi & Bayar</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h2 class="font-bold text-gray-800 mb-4">Daftar Barang</h2>

                    <div class="relative mb-4">
                        <input type="text" id="searchInput" onkeyup="cariBarang()" placeholder="🔍 Cari barang..."
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#4A7C59]">
                    </div>

                    <div class="space-y-3" id="daftarBarang">

                        <div onclick="pilihBarang('Tenda Dome 4P', 50000, 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=200&q=80')"
                             class="item-barang cursor-pointer flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-[#4A7C59] hover:bg-green-50/30 transition">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=200&q=80" class="w-14 h-12 object-cover rounded-md">
                                <div>
                                    <h3 class="nama-barang font-semibold text-sm text-gray-800">Tenda Dome 4P</h3>
                                    <p class="text-xs text-gray-500">Rp 50.000 / hari</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Tersedia</span>
                        </div>

                        <div onclick="pilihBarang('Sleeping Bag', 25000, 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?w=200&q=80')"
                             class="item-barang cursor-pointer flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-[#4A7C59] hover:bg-green-50/30 transition">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?w=200&q=80" class="w-14 h-12 object-cover rounded-md">
                                <div>
                                    <h3 class="nama-barang font-semibold text-sm text-gray-800">Sleeping Bag</h3>
                                    <p class="text-xs text-gray-500">Rp 25.000 / hari</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Tersedia</span>
                        </div>

                        <div onclick="pilihBarang('Kompor Portable', 20000, 'https://images.unsplash.com/photo-1510672981848-a1c4f1cb5ccf?w=200&q=80')"
                             class="item-barang cursor-pointer flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-[#4A7C59] hover:bg-green-50/30 transition">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1510672981848-a1c4f1cb5ccf?w=200&q=80" class="w-14 h-12 object-cover rounded-md">
                                <div>
                                    <h3 class="nama-barang font-semibold text-sm text-gray-800">Kompor Portable</h3>
                                    <p class="text-xs text-gray-500">Rp 20.000 / hari</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Tersedia</span>
                        </div>

                        <div onclick="pilihBarang('Carrier 60L', 30000, 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=200&q=80')"
                             class="item-barang cursor-pointer flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-[#4A7C59] hover:bg-green-50/30 transition">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=200&q=80" class="w-14 h-12 object-cover rounded-md">
                                <div>
                                    <h3 class="nama-barang font-semibold text-sm text-gray-800">Carrier 60L</h3>
                                    <p class="text-xs text-gray-500">Rp 30.000 / hari</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Tersedia</span>
                        </div>

                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h2 class="font-bold text-gray-800 mb-4">Detail Peminjaman</h2>
                        <p class="text-xs text-gray-500 mb-2">Barang Dipilih:</p>

                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg border border-gray-200 mb-6">
                            <img id="detailGambar" src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=200&q=80" class="w-20 h-16 object-cover rounded-md">
                            <div>
                                <h3 id="detailNama" class="font-bold text-gray-800">Tenda Dome 4P</h3>
                                <p id="detailHarga" class="text-sm text-gray-600">Rp 50.000 / hari</p>
                            </div>
                        </div>

                        <div class="space-y-4 text-sm">
                            <div class="flex items-center justify-between">
                                <label class="font-medium text-gray-700">Jumlah Hari</label>
                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <button type="button" onclick="ubahHari(-1)" class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 font-bold">-</button>
                                    <input type="text" id="jumlahHari" value="1" readonly class="w-12 text-center font-semibold focus:outline-none">
                                    <button type="button" onclick="ubahHari(1)" class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 font-bold">+</button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <label class="font-medium text-gray-700">Tanggal Pinjam</label>
                                <input type="date" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:border-[#4A7C59]">
                            </div>

                            <div class="flex items-center justify-between">
                                <label class="font-medium text-gray-700">Tanggal Kembali</label>
                                <input type="date" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:border-[#4A7C59]">
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="font-medium text-gray-600">Estimasi Total:</span>
                                <span id="totalBiaya" class="text-lg font-bold text-[#1E3A2F]">Rp 50.000</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="flex items-center justify-between mt-6">
                <button class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                    ← Kembali
                </button>
                <button onclick="alert('Barang berhasil disimpan ke keranjang!')" class="px-6 py-2.5 bg-[#1E3A2F] text-white rounded-lg text-sm font-medium hover:bg-[#152921] transition shadow-sm">
                    Simpan ke Keranjang →
                </button>
            </div>
        </div>

    </main>

    <script>
        let hargaPerHari = 50000;

        function pilihBarang(nama, harga, gambar) {
            document.getElementById('detailNama').innerText = nama;
            document.getElementById('detailHarga').innerText = 'Rp ' + harga.toLocaleString('id-ID') + ' / hari';
            document.getElementById('detailGambar').src = gambar;
            hargaPerHari = harga;
            hitungTotal();
        }

        function ubahHari(perubahan) {
            let inputHari = document.getElementById('jumlahHari');
            let hariSekarang = parseInt(inputHari.value);
            if (hariSekarang + perubahan >= 1) {
                inputHari.value = hariSekarang + perubahan;
                hitungTotal();
            }
        }

        function hitungTotal() {
            let hari = parseInt(document.getElementById('jumlahHari').value);
            let total = hargaPerHari * hari;
            document.getElementById('totalBiaya').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function cariBarang() {
            let keyword = document.getElementById('searchInput').value.toLowerCase();
            let items = document.querySelectorAll('.item-barang');

            items.forEach(item => {
                let nama = item.querySelector('.nama-barang').innerText.toLowerCase();
                item.style.display = nama.includes(keyword) ? 'flex' : 'none';
            });
        }
    </script>
</body>
</html>
