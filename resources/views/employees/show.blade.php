@extends('employees.master')
@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')
@section('page-subtitle', 'Informasi lengkap data pegawai')

@section('content')

<!-- Back Button & Title -->
<div class="mb-6">
    <button onclick="history.back()" class="flex items-center text-gray-600 hover:text-gray-800 mb-4 transition duration-200">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        <span class="font-medium">Kembali</span>
    </button>
    <h2 class="text-2xl font-bold text-gray-800">Detail Pegawai</h2>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Card Header -->
    <div class="bg-pink-500 text-white px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <h3 class="text-lg font-semibold">Informasi Pegawai</h3>
        </div>
        <!-- Status Badge -->
        @if($employee->status == 'aktif')
            <span class="bg-green-100 text-green-800 px-4 py-1.5 rounded-full text-sm font-medium">Aktif</span>
        @else
            <span class="bg-red-100 text-red-800 px-4 py-1.5 rounded-full text-sm font-medium">Nonaktif</span>
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

            <!-- Email -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Email</label>
                <p class="text-base text-gray-900">{{ $employee->email }}</p>
            </div>

            <!-- Nomor Telepon -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Nomor Telepon</label>
                <p class="text-base text-gray-900">{{ $employee->nomor_telepon }}</p>
            </div>

            <!-- Tanggal Lahir -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal Lahir</label>
                <p class="text-base text-gray-900">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->age }} tahun</p>
            </div>

            <!-- Alamat -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Alamat</label>
                <p class="text-base text-gray-900 leading-relaxed">{{ $employee->alamat }}</p>
            </div>

            <!-- Department -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Department</label>
                <p class="text-base text-gray-900">{{ $employee->department->nama_department }}</p>
            </div>

            <!-- Posisi -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Posisi</label>
                <p class="text-base text-gray-900">{{ $employee->posisi }}</p>
            </div>

            <!-- Tanggal Masuk -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal Masuk</label>
                <p class="text-base text-gray-900">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    Masa kerja: {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffForHumans(null, true) }}
                </p>
            </div>

            <!-- Status -->
            <div class="pb-5">
                <label class="block text-sm font-medium text-gray-500 mb-2">Status Pegawai</label>
                <p class="text-base text-gray-900 capitalize">{{ $employee->status }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                {{-- Uncomment jika ingin mengaktifkan tombol Edit
                <a href="{{ route('employees.edit', $employee->id) }}" 
                   class="bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Pegawai
                </a>
                --}}
                
                <button type="button" 
                        onclick="history.back()"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </button>
                
                {{-- Uncomment jika ingin mengaktifkan tombol Hapus
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
                --}}
            </div>
        </div>
    </div>
</div>

@endsection