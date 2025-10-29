@extends('employees.master')
@section('title', 'Detail Position')
@section('page-title', 'Detail Position')
@section('page-subtitle', 'Informasi lengkap jabatan')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('positions.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Position</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap jabatan</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="badge" class="w-5 h-5"></i>
            Informasi Position
        </h3>
    </div>
    
    <div class="p-6">
        <!-- Nama Jabatan -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                <i data-lucide="briefcase" class="w-4 h-4"></i>
                Nama Jabatan
            </label>
            <p class="text-gray-900 text-lg font-medium bg-gray-50 px-4 py-3 rounded-lg border border-gray-200">
                {{ $position->nama_jabatan }}
            </p>
        </div>

        <!-- Gaji Pokok -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                Gaji Pokok
            </label>
            <p class="text-gray-900 text-lg font-medium bg-gray-50 px-4 py-3 rounded-lg border border-gray-200">
                Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
            </p>
        </div>

        <!-- Informasi Tambahan -->
         {{--
        <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1 flex items-center gap-1">
                    <i data-lucide="calendar-plus" class="w-3 h-3"></i>
                    Dibuat
                </label>
                <p class="text-sm text-gray-800">
                    {{ $position->created_at->format('d M Y, H:i') }}
                </p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1 flex items-center gap-1">
                    <i data-lucide="calendar-clock" class="w-3 h-3"></i>
                    Terakhir Update
                </label>
                <p class="text-sm text-gray-800">
                    {{ $position->updated_at->format('d M Y, H:i') }}
                </p>
            </div>
        </div>
        --}}

        <!-- Buttons -->
         {{--
        <div class="flex gap-3 pt-4 border-t">
            <a href="{{ route('positions.edit', $position->id) }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
                <i data-lucide="pencil" class="w-4 h-4"></i>
                Edit Position
            </a>
            --}}
            <a href="{{ route('positions.index') }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali
            </a>
            {{--
            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Yakin ingin menghapus position ini?')"
                        class="flex items-center gap-2 px-6 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all font-semibold">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                    Hapus
                </button>
            </form>
            --}}
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection