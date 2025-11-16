@extends('employees.master')
@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Pegawai')
@section('page-subtitle', 'Input data pegawai baru')

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
            <p class="text-sm text-gray-500 mt-1">Lengkapi form di bawah untuk menambah pegawai</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="user-plus" class="w-5 h-5"></i>
            Form Tambah Pegawai
        </h3>
    </div>
    
    <form action="{{ route('employees.store') }}" method="POST" class="p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Lengkap -->
            <div class="md:col-span-2">
                <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_lengkap" 
                       name="nama_lengkap" 
                       value="{{ old('nama_lengkap') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('nama_lengkap') border-red-500 @enderror" 
                       placeholder="Contoh: Ahmad Zulkifli"
                       required>
                @error('nama_lengkap')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('email') border-red-500 @enderror" 
                       placeholder="contoh@email.com"
                       required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label for="nomor_telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nomor Telepon <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nomor_telepon" 
                       name="nomor_telepon" 
                       value="{{ old('nomor_telepon') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('nomor_telepon') border-red-500 @enderror" 
                       placeholder="081234567890"
                       required>
                @error('nomor_telepon')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Lahir <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_lahir" 
                       name="tanggal_lahir" 
                       value="{{ old('tanggal_lahir') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tanggal_lahir') border-red-500 @enderror"
                       required>
                @error('tanggal_lahir')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label for="tanggal_masuk" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Masuk <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_masuk" 
                       name="tanggal_masuk" 
                       value="{{ old('tanggal_masuk') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tanggal_masuk') border-red-500 @enderror"
                       required>
                @error('tanggal_masuk')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="md:col-span-2">
                <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                    Alamat <span class="text-red-500">*</span>
                </label>
                <textarea id="alamat" 
                          name="alamat" 
                          rows="3"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('alamat') border-red-500 @enderror" 
                          placeholder="Alamat lengkap"
                          required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Department -->
            <div>
                <label for="departemen_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Department
                </label>
                <select id="departemen_id" 
                        name="departemen_id" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('departemen_id') border-red-500 @enderror">
                    <option value="">-- Pilih Department --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->nama_department }}
                        </option>
                    @endforeach
                </select>
                @error('departemen_id')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Position -->
            <div>
                <label for="position_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Posisi <span class="text-red-500">*</span>
                </label>
                <select id="position_id" 
                        name="position_id" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('position_id') border-red-500 @enderror"
                        required>
                    <option value="">-- Pilih Posisi --</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                            {{ $position->nama_posisi }} (Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('position_id')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Status -->
            <div class="md:col-span-2">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select id="status" 
                        name="status" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('status') border-red-500 @enderror"
                        required>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-6 mt-6 border-t">
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