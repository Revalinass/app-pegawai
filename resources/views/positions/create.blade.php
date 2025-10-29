@extends('employees.master')
@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Pegawai')
@section('page-subtitle', 'Tambahkan data pegawai baru')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('employees.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Tambah Pegawai Baru</h2>
            <p class="text-sm text-gray-500 mt-1">Isi form berikut untuk menambahkan data pegawai baru</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            Form Pegawai
        </h3>
    </div>
    
    <form action="{{ route('employees.store') }}" method="POST" class="p-6">
        @csrf

        <!-- Nama Lengkap -->
        <div class="mb-6">
            <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">
                Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
                   value="{{ old('nama_lengkap') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all"
                   placeholder="Masukkan nama lengkap" required>
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email <span class="text-red-500">*</span>
            </label>
            <input type="email" id="email" name="email"
                   value="{{ old('email') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all"
                   placeholder="contoh@email.com" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="mb-6">
            <label for="nomor_telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                Nomor Telepon <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nomor_telepon" name="nomor_telepon"
                   value="{{ old('nomor_telepon') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all"
                   placeholder="08xxxxxxxxxx" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-6">
            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                Tanggal Lahir <span class="text-red-500">*</span>
            </label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                   value="{{ old('tanggal_lahir') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all" required>
        </div>

        <!-- Alamat -->
        <div class="mb-6">
            <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                Alamat <span class="text-red-500">*</span>
            </label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all"
                      placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
        </div>

        <!-- Department -->
        <div class="mb-6">
            <label for="department_id" class="block text-sm font-semibold text-gray-700 mb-2">
                Department
            </label>
            <select id="department_id" name="department_id"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all">
                <option value="">-- Pilih Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->nama_department }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Posisi -->
        <div class="mb-6">
            <label for="posisi" class="block text-sm font-semibold text-gray-700 mb-2">
                Posisi
            </label>
            <input type="text" id="posisi" name="posisi" 
                   value="{{ old('posisi') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all"
                   placeholder="Contoh: Manager, Staff">
        </div>

        <!-- Tanggal Masuk -->
        <div class="mb-6">
            <label for="tanggal_masuk" class="block text-sm font-semibold text-gray-700 mb-2">
                Tanggal Masuk <span class="text-red-500">*</span>
            </label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                   value="{{ old('tanggal_masuk') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all" required>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                Status <span class="text-red-500">*</span>
            </label>
            <select id="status" name="status"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-4 border-t">
            <button type="submit" 
                    class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
                <i data-lucide="save" class="w-4 h-4"></i>
                Simpan Pegawai
            </button>
            <a href="{{ route('employees.index') }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                <i data-lucide="x" class="w-4 h-4"></i>
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    lucide.createIcons();
</script>
@endsection
