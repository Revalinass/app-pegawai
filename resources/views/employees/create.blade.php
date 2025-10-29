@extends('employees.master')
@section('title', 'Tambah Pegawai')
@section('page-title', 'Employees')
@section('page-subtitle', 'Tambah data pegawai baru')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-6">Form Pegawai</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <!-- Nama Lengkap -->
        <div class="mb-4">
            <label for="nama_lengkap" class="block font-medium">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" 
                   value="{{ old('nama_lengkap') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" id="email" name="email" 
                   value="{{ old('email') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="mb-4">
            <label for="nomor_telepon" class="block font-medium">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" 
                   value="{{ old('nomor_telepon') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label for="tanggal_lahir" class="block font-medium">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                   value="{{ old('tanggal_lahir') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label for="alamat" class="block font-medium">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>{{ old('alamat') }}</textarea>
        </div>

        <!-- Department -->
        <div class="mb-4">
            <label for="department_id" class="block font-medium">Department</label>
            <select id="department_id" name="department_id"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->nama_department }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Posisi -->
        <div class="mb-4">
            <label for="posisi" class="block font-medium">Posisi</label>
            <input type="text" id="posisi" name="posisi" placeholder="Contoh: Manager, Staff"
                   value="{{ old('posisi') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
        </div>

        <!-- Tanggal Masuk -->
        <div class="mb-4">
            <label for="tanggal_masuk" class="block font-medium">Tanggal Masuk</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                   value="{{ old('tanggal_masuk') }}"
                   class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block font-medium">Status</label>
            <select id="status" name="status"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
