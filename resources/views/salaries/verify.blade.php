 <!--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Slip Gaji</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gradient-to-br from-rose-50 to-pink-100 min-h-screen py-12 px-4">
    <div class="max-w-2xl mx-auto">
        
        Success Badge
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-4 border-green-500">
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-6 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-white/20 p-4 rounded-full">
                        <i data-lucide="check-circle" class="w-16 h-16"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold">✅ VERIFIKASI BERHASIL</h1>
                <p class="text-green-100 mt-2">Slip gaji ini adalah dokumen asli dan terverifikasi</p>
            </div>

            <!-- Verified Info 
            <div class="p-8">
                <div class="bg-green-50 border-2 border-green-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center gap-3">
                        <i data-lucide="shield-check" class="w-8 h-8 text-green-600"></i>
                        <div>
                            <p class="font-bold text-green-900">Dokumen Terverifikasi</p>
                            <p class="text-sm text-green-700">ID: #{{ str_pad($salary->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Data 
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-gray-800 border-b-2 border-rose-500 pb-2">Informasi Karyawan</h2>
                    
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div class="font-semibold text-gray-600">Nama</div>
                        <div class="col-span-2 text-gray-900">: {{ $salary->employee->nama_lengkap }}</div>
                        
                        <div class="font-semibold text-gray-600">Posisi</div>
                        <div class="col-span-2 text-gray-900">: {{ $salary->employee->position->nama_posisi ?? '-' }}</div>
                        
                        <div class="font-semibold text-gray-600">Department</div>
                        <div class="col-span-2 text-gray-900">: {{ $salary->employee->department->nama_department ?? '-' }}</div>
                        
                        <div class="font-semibold text-gray-600">Periode</div>
                        <div class="col-span-2 text-gray-900">: {{ $bulan }}</div>
                    </div>
                </div>

                <!-- Salary Data 
                <div class="space-y-4 mt-6">
                    <h2 class="text-xl font-bold text-gray-800 border-b-2 border-rose-500 pb-2">Rincian Gaji</h2>
                    
                    <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Gaji Pokok</span>
                            <span class="font-semibold text-green-600">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tunjangan</span>
                            <span class="font-semibold text-green-600">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Potongan</span>
                            <span class="font-semibold text-red-600">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t-2 border-gray-300 pt-3 flex justify-between">
                            <span class="font-bold text-gray-800 text-lg">TOTAL GAJI BERSIH</span>
                            <span class="font-bold text-rose-600 text-lg">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Verification Timestamp 
                <div class="mt-6 text-center text-sm text-gray-500">
                    <i data-lucide="clock" class="w-4 h-4 inline"></i>
                    Diverifikasi pada: {{ now()->locale('id')->isoFormat('DD MMMM YYYY, HH:mm') }} WIB
                </div>

                <!-- Back Button 
                <div class="mt-6 text-center">
                    <button onclick="window.close()" class="bg-rose-500 hover:bg-rose-600 text-white px-8 py-3 rounded-lg font-semibold transition-all">
                        Tutup Halaman
                    </button>
                </div>
            </div>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
-->