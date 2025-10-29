@extends('employees.master')
@section('title', 'Edit Pegawai')
@section('page-title', 'Edit Pegawai')
@section('page-subtitle', 'Edit data pegawai')

@section('content')

<!-- Back Button & Title -->
<div class="mb-6">
    <button onclick="history.back()" class="flex items-center text-gray-600 hover:text-gray-800 mb-4">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <h2 class="text-xl font-bold text-gray-800">Edit Pegawai</h2>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow-sm">
    <!-- Form Header -->
    <div class="bg-pink-500 text-white px-6 py-4 rounded-t-lg flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        <h3 class="text-lg font-semibold">Form Edit Pegawai</h3>
    </div>

    <!-- Form Body -->
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Nama Lengkap -->
            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_lengkap" 
                       name="nama_lengkap" 
                       value="{{ $employee->nama_lengkap }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ $employee->email }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Telepon <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nomor_telepon" 
                       name="nomor_telepon" 
                       value="{{ $employee->nomor_telepon }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Lahir <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_lahir" 
                       name="tanggal_lahir" 
                       value="{{ $employee->tanggal_lahir }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat <span class="text-red-500">*</span>
                </label>
                <textarea id="alamat" 
                          name="alamat" 
                          rows="4"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition resize-none">{{ $employee->alamat }}</textarea>
            </div>

            <!-- Department -->
            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Department <span class="text-red-500">*</span>
                </label>
                <select id="department_id" 
                        name="department_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                    <option value="">Pilih Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_department }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Posisi -->
            <div>
                <label for="posisi" class="block text-sm font-medium text-gray-700 mb-2">
                    Posisi <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="posisi" 
                       name="posisi" 
                       value="{{ $employee->posisi }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Masuk <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_masuk" 
                       name="tanggal_masuk" 
                       value="{{ $employee->tanggal_masuk }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select id="status" 
                        name="status"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition">
                    <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="submit" 
                        class="bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-2.5 rounded-lg transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Update Pegawai
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

@endsection