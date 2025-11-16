@extends('employees.master')
@section('title', 'Edit Posisi')
@section('page-title', 'Edit Posisi')
@section('page-subtitle', 'Edit data posisi')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('positions.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Posisi</h2>
            <p class="text-sm text-gray-500 mt-1">Ubah data posisi yang sudah ada</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="badge" class="w-5 h-5"></i>
            Form Edit Posisi
        </h3>
    </div>
    
    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <!-- Nama Posisi -->
            <div>
                <label for="nama_posisi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Posisi <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_posisi" 
                       name="nama_posisi" 
                       value="{{ old('nama_posisi', $position->nama_posisi) }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('nama_posisi') border-red-500 @enderror" 
                       required>
                @error('nama_posisi')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Gaji Pokok -->
            <div>
                <label for="gaji_pokok" class="block text-sm font-semibold text-gray-700 mb-2">
                    Gaji Pokok <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                    <input type="number" 
                           id="gaji_pokok" 
                           name="gaji_pokok" 
                           value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                           class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('gaji_pokok') border-red-500 @enderror" 
                           required>
                </div>
                @error('gaji_pokok')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea id="deskripsi" 
                          name="deskripsi" 
                          rows="4"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $position->deskripsi) }}</textarea>
                @error('deskripsi')
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
                Update Posisi
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