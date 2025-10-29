<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="border-l-4 border-pink-500 pl-4">
                <h1 class="text-2xl font-bold text-gray-800">Edit Absensi</h1>
                <p class="text-sm text-gray-500 mt-1">Edit data absensi pegawai</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-6 py-8">
        <!-- Back Button & Title -->
        <div class="mb-6">
            <a href="{{ route('attendance.index') }}" class="flex items-center text-gray-600 hover:text-gray-800 mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
            <h2 class="text-xl font-bold text-gray-800">Edit Absensi</h2>
            <p class="text-sm text-gray-500">Ubah data absensi yang sudah ada</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm">
            <!-- Form Header -->
            <div class="bg-pink-500 text-white px-6 py-4 rounded-t-lg flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                <h3 class="text-lg font-semibold">Form Edit Absensi</h3>
            </div>

            <!-- Form Body -->
            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Pegawai -->
                    <div>
                        <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Pegawai <span class="text-red-500">*</span>
                        </label>
                        <select id="employee_id" 
                                name="employee_id"
                                required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                            <option value="">Pilih Pegawai</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }} - {{ $employee->posisi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="tanggal" 
                               name="tanggal" 
                               value="{{ $attendance->tanggal }}"
                               required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                    </div>

                    <!-- Jam Masuk -->
                    <div>
                        <label for="jam_masuk" class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Masuk <span class="text-red-500">*</span>
                        </label>
                        <input type="time" 
                               id="jam_masuk" 
                               name="jam_masuk"
                               value="{{ $attendance->jam_masuk }}"
                               required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                    </div>

                    <!-- Jam Keluar -->
                    <div>
                        <label for="jam_keluar" class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Keluar
                        </label>
                        <input type="time" 
                               id="jam_keluar" 
                               name="jam_keluar"
                               value="{{ $attendance->jam_keluar }}"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika pegawai belum keluar</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status Kehadiran <span class="text-red-500">*</span>
                        </label>
                        <select id="status" 
                                name="status"
                                required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                            <option value="">Pilih Status</option>
                            <option value="hadir" {{ $attendance->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ $attendance->status == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ $attendance->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alfa" {{ $attendance->status == 'alfa' ? 'selected' : '' }}>Alfa</option>
                        </select>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                            Keterangan
                        </label>
                        <textarea id="keterangan" 
                                  name="keterangan" 
                                  rows="4"
                                  placeholder="Tambahkan catatan atau keterangan (opsional)"
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition resize-none">{{ $attendance->keterangan }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 pt-4">
                        <button type="submit" 
                                class="bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-2.5 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>

                            Update Absensi
                        </button>
                        <a href="{{ route('attendance.index') }}"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>