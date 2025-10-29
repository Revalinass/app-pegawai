@extends('employees.master')
@section('title', 'Tambah Gaji')
@section('page-title', 'Tambah Data Gaji')
@section('page-subtitle', 'Input data gaji bulanan untuk pegawai')

@section('content')

<!-- Back Button & Title -->
<div class="mb-6">
    <button onclick="history.back()" class="flex items-center text-gray-600 hover:text-gray-800 mb-4">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow-sm">
    <!-- Form Header -->
    <div class="bg-pink-500 text-white px-6 py-4 rounded-t-lg flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        <h3 class="text-lg font-semibold">Form Tambah Gaji</h3>
    </div>

    <!-- Form Body -->
    <form action="{{ route('salaries.store') }}" method="POST" class="p-6">
        @csrf

        <div class="space-y-6">
            <!-- Nama Pegawai -->
            <div>
                <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Pegawai <span class="text-red-500">*</span>
                </label>
                <select name="employee_id" 
                        id="employee_id" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Gaji Pokok -->
            <div>
                <label for="gaji_pokok" class="block text-sm font-medium text-gray-700 mb-2">
                    Gaji Pokok <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       name="gaji_pokok" 
                       id="gaji_pokok" 
                       required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition"
                       placeholder="Masukkan nominal gaji pokok">
            </div>

            <!-- Tunjangan -->
            <div>
                <label for="tunjangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Tunjangan (Opsional)
                </label>
                <input type="number" 
                       name="tunjangan" 
                       id="tunjangan"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition"
                       >
            </div>

            <!-- Total Gaji (otomatis) -->
            <div>
                <label for="total_gaji" class="block text-sm font-medium text-gray-700 mb-2">
                    Total Gaji
                </label>
                <input type="number" 
                       name="total_gaji" 
                       id="total_gaji" 
                       readonly
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition bg-gray-50"
                       placeholder="Akan terhitung otomatis">
            </div>

            <!-- Periode -->
            <div>
                <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">
                    Periode <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="periode" 
                       id="periode" 
                       required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition"
                       >
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="submit" 
                        class="bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-2.5 rounded-lg transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Data
                </button>
                <button type="button" 
                        onclick="history.back()"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const gajiPokok = document.getElementById('gaji_pokok');
    const tunjangan = document.getElementById('tunjangan');
    const totalGaji = document.getElementById('total_gaji');

    function hitungTotal() {
        const pokok = parseFloat(gajiPokok.value) || 0;
        const bonus = parseFloat(tunjangan.value) || 0;
        totalGaji.value = pokok + bonus;
    }

    gajiPokok.addEventListener('input', hitungTotal);
    tunjangan.addEventListener('input', hitungTotal);
</script>

@endsection