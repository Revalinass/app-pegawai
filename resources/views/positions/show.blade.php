@extends('employees.master')
@section('title', 'Detail Posisi')
@section('page-title', 'Detail Posisi')
@section('page-subtitle', 'Informasi lengkap data posisi')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('positions.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Posisi</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data posisi</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="badge" class="w-5 h-5"></i>
            Informasi Posisi
        </h3>
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-5">
            <!-- Nama Posisi -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Nama Posisi</label>
                <p class="text-lg font-semibold text-gray-900">{{ $position->nama_posisi }}</p>
            </div>

            <!-- Gaji Pokok -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Gaji Pokok</label>
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</p>
            </div>

            <!-- Deskripsi -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Deskripsi</label>
                <p class="text-base text-gray-900">{{ $position->deskripsi ?? '-' }}</p>
            </div>

            <!-- Jumlah Pegawai -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Jumlah Pegawai</label>
                <p class="text-lg font-bold text-gray-900">{{ $position->employees->count() }} Pegawai</p>
            </div>

            <!-- Timestamp
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Dibuat Pada</label>
                    <p class="text-sm text-gray-700">{{ $position->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Terakhir Diubah</label>
                    <p class="text-sm text-gray-700">{{ $position->updated_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
            -->
        </div>
    </div>

    <!-- Card Footer -->
    <div class="bg-gray-50 px-6 py-4 flex gap-3">
        <a href="{{ route('positions.index') }}" 
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