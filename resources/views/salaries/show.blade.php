@extends('employees.master')
@section('title', 'Detail Gaji')
@section('page-title', 'Detail Gaji')
@section('page-subtitle', 'Informasi lengkap data gaji')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('salaries.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Gaji</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data gaji pegawai</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="wallet" class="w-5 h-5"></i>
            Informasi Gaji
        </h3>
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-5">
            <!-- Pegawai -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Pegawai</label>
                <p class="text-lg font-semibold text-gray-900">{{ $salary->employee->nama_lengkap }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ $salary->employee->position->nama_posisi }}</p>
            </div>

            <!-- Periode -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Periode</label>
                <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($salary->periode)->translatedFormat('F Y') }}</p>
            </div>

            <!-- Rincian Gaji -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-3">Rincian Gaji</label>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Gaji Pokok</span>
                        <span class="font-semibold text-gray-900">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Tunjangan</span>
                        <span class="font-semibold text-green-600">+ Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Potongan</span>
                        <span class="font-semibold text-red-600">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Gaji -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Total Gaji</label>
                <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</p>
            </div>
            
        </div>
    </div>

    <!-- Card Footer -->
    <div class="bg-gray-50 px-6 py-4 flex gap-3">
        <a href="{{ route('salaries.index') }}" 
           class="flex items-center gap-2 px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all font-semibold">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali
        </a>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection