@extends('employees.master')
@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')
@section('page-subtitle', 'Informasi lengkap data pegawai')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('employees.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Pegawai</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data pegawai</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4 flex items-center justify-between">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="user" class="w-5 h-5"></i>
            Informasi Pegawai
        </h3>
        <!-- Status Badge -->
        @if($employee->status == 'aktif')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span> Aktif
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                <span class="w-2 h-2 bg-gray-500 rounded-full"></span> Nonaktif
            </span>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-5">
            <!-- Nama Lengkap -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Nama Lengkap</label>
                <p class="text-lg font-semibold text-gray-900">{{ $employee->nama_lengkap }}</p>
            </div>

            <!-- Email & Telepon -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pb-5 border-b border-gray-200">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Email</label>
                    <p class="text-base text-gray-900">{{ $employee->email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Nomor Telepon</label>
                    <p class="text-base text-gray-900">{{ $employee->nomor_telepon }}</p>
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal Lahir</label>
                <p class="text-base text-gray-900">{{ $employee->tanggal_lahir->format('d F Y') }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $employee->tanggal_lahir->age }} tahun</p>
            </div>

            <!-- Tanggal Masuk -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal Masuk</label>
                <p class="text-base text-gray-900">{{ $employee->tanggal_masuk->format('d F Y') }}</p>
                <p class="text-sm text-gray-500 mt-1">Lama bekerja: {{ $employee->tanggal_masuk->diffForHumans(['parts' => 2]) }}</p>
            </div>

            <!-- Alamat -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Alamat</label>
                <p class="text-base text-gray-900">{{ $employee->alamat }}</p>
            </div>

            <!-- Department & Position -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pb-5 border-b border-gray-200">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Department</label>
                    <p class="text-base text-gray-900">
                        {{ $employee->department->nama_department ?? '-' }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Posisi</label>
                    <p class="text-base text-gray-900">{{ $employee->position->nama_posisi }}</p>
                </div>
            </div>

            <!-- Gaji Pokok -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Gaji Pokok</label>
                <p class="text-lg font-bold text-gray-900">Rp {{ number_format($employee->position->gaji_pokok, 0, ',', '.') }}</p>
            </div>

            <!-- Timestamp -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Dibuat Pada</label>
                    <p class="text-sm text-gray-700">{{ $employee->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">Terakhir Diubah</label>
                    <p class="text-sm text-gray-700">{{ $employee->updated_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Footer -->
    <div class="bg-gray-50 px-6 py-4 flex gap-3">
        <a href="{{ route('employees.edit', $employee->id) }}" 
           class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
            <i data-lucide="edit" class="w-4 h-4"></i>
            Edit
        </a>
        <a href="{{ route('employees.index') }}" 
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