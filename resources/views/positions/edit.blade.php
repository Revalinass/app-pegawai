@extends('employees.master')
@section('title', 'Edit Position')
@section('page-title', 'Edit Position')
@section('page-subtitle', 'Update data jabatan')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('positions.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Position</h2>
            <p class="text-sm text-gray-500 mt-1">Update informasi jabatan</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="badge" class="w-5 h-5"></i>
            Form Edit Position
        </h3>
    </div>
    
    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Jabatan -->
        <div class="mb-6">
            <label for="nama_jabatan" class="block text-sm font-semibold text-gray-700 mb-2">
                Nama Jabatan <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="nama_jabatan" 
                   name="nama_jabatan" 
                   value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('nama_jabatan') border-red-500 @enderror" 
                   placeholder="Contoh: Manager Marketing"
                   required>
            @error('nama_jabatan')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Gaji Pokok -->
        <div class="mb-6">
            <label for="gaji_pokok" class="block text-sm font-semibold text-gray-700 mb-2">
                Gaji Pokok <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                <input type="number" 
                       id="gaji_pokok" 
                       name="gaji_pokok" 
                       value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                       class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('gaji_pokok') border-red-500 @enderror" 
                       placeholder="5000000"
                       required>
            </div>
            @error('gaji_pokok')
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
                Update Position
            </button>
            <a href="{{ route('positions.index') }}" 
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