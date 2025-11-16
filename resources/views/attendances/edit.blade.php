@extends('employees.master')
@section('title', 'Edit Absensi')
@section('page-title', 'Edit Absensi')
@section('page-subtitle', 'Edit data absensi pegawai')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('attendances.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Data Absensi</h2>
            <p class="text-sm text-gray-500 mt-1">Ubah data absensi yang sudah ada</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="edit" class="w-5 h-5"></i>
            Form Edit Absensi
        </h3>
    </div>
    
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <!-- Pegawai -->
        <div class="mb-6">
            <label for="employee_id" class="block text-sm font-semibold text-gray-700 mb-2">
                Nama Pegawai <span class="text-red-500">*</span>
            </label>
            <select id="employee_id" 
                    name="employee_id" 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('employee_id') border-red-500 @enderror"
                    required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }} - {{ $employee->position->nama_posisi ?? '-' }}
                    </option>
                @endforeach
            </select>
            @error('employee_id')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Tanggal -->
        <div class="mb-6">
            <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                Tanggal <span class="text-red-500">*</span>
            </label>
            <input type="date" 
                   id="tanggal" 
                   name="tanggal" 
                   value="{{ old('tanggal', $attendance->tanggal->format('Y-m-d')) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tanggal') border-red-500 @enderror"
                   required>
            @error('tanggal')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Jam Masuk -->
        <div class="mb-6">
            <label for="jam_masuk" class="block text-sm font-semibold text-gray-700 mb-2">
                Jam Masuk <span class="text-red-500">*</span>
            </label>
            <input type="time" 
                   id="jam_masuk" 
                   name="jam_masuk" 
                   value="{{ old('jam_masuk', $attendance->jam_masuk) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('jam_masuk') border-red-500 @enderror"
                   required>
            @error('jam_masuk')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Jam Keluar -->
        <div class="mb-6">
            <label for="jam_keluar" class="block text-sm font-semibold text-gray-700 mb-2">
                Jam Keluar
            </label>
            <input type="time" 
                   id="jam_keluar" 
                   name="jam_keluar" 
                   value="{{ old('jam_keluar', $attendance->jam_keluar) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('jam_keluar') border-red-500 @enderror">
            @error('jam_keluar')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                Status Kehadiran <span class="text-red-500">*</span>
            </label>
            <select id="status" 
                    name="status" 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('status') border-red-500 @enderror"
                    required>
                <option value="">-- Pilih Status --</option>
                <option value="hadir" {{ old('status', $attendance->status) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ old('status', $attendance->status) == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ old('status', $attendance->status) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ old('status', $attendance->status) == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Keterangan -->
        <div class="mb-6">
            <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                Keterangan
            </label>
            <textarea id="keterangan" 
                      name="keterangan" 
                      rows="4"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all resize-none @error('keterangan') border-red-500 @enderror"
                      placeholder="Tambahkan catatan atau keterangan (opsional)">{{ old('keterangan', $attendance->keterangan) }}</textarea>
            @error('keterangan')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-4 border-t">
            <button type="submit" 
                    class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
                <i data-lucide="save" class="w-4 h-4"></i>
                Update Absensi
            </button>
            <a href="{{ route('attendances.index') }}" 
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