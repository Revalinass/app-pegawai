@extends('employees.master')
@section('title', 'Detail Gaji Pegawai')
@section('page-title', 'Salary')
@section('page-subtitle', 'Informasi lengkap data gaji pegawai')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('salaries.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Gaji Pegawai</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data gaji pegawai</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <div class="flex items-center justify-between text-white">
            <h3 class="font-semibold flex items-center gap-2">
                <i data-lucide="dollar-sign" class="w-5 h-5"></i>
                Informasi Gaji
            </h3>
            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-medium">
                {{ $salary->periode }}
            </span>
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-6">
            <!-- Nama Pegawai -->
            <div class="border-b border-gray-200 pb-4">
                <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                    <i data-lucide="user" class="w-4 h-4"></i>
                    Nama Pegawai
                </label>
                <p class="text-lg font-semibold text-gray-800">{{ $salary->employee->nama_lengkap }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ $salary->employee->posisi }} - {{ $salary->employee->department->nama_department }}</p>
            </div>

            <!-- Periode -->
            <div class="border-b border-gray-200 pb-4">
                <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    Periode Gaji
                </label>
                <p class="text-base text-gray-800 bg-gray-50 px-4 py-2 rounded-lg">{{ $salary->periode }}</p>
            </div>

            <!-- Komponen Gaji -->
            <div class="border-b border-gray-200 pb-4">
                <label class="block text-sm font-semibold text-gray-600 mb-3">Komponen Gaji</label>
                <div class="space-y-3">
                    <!-- Gaji Pokok -->
                    <div class="bg-blue-50 rounded-lg p-4 flex justify-between items-center border border-blue-100">
                        <div>
                            <p class="text-xs text-gray-600 mb-1 font-medium">Gaji Pokok</p>
                            <p class="text-lg font-bold text-blue-700">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i data-lucide="wallet" class="w-6 h-6 text-blue-600"></i>
                        </div>
                    </div>
                    
                    <!-- Tunjangan -->
                    <div class="bg-green-50 rounded-lg p-4 flex justify-between items-center border border-green-100">
                        <div>
                            <p class="text-xs text-gray-600 mb-1 font-medium">Tunjangan</p>
                            <p class="text-lg font-bold text-green-700">Rp {{ number_format($salary->tunjangan ?? 0, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i data-lucide="gift" class="w-6 h-6 text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Gaji -->
                <div class="bg-blue-50 rounded-xl shadow-sm border border-gray-100 p-5 mt-4 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Gaji</p>
                    <p class="text-2xl font-bold text-gray-500 mt-1">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-rose-50 text-rose-500 p-4 rounded-full shadow-inner">
                    <i data-lucide="banknote" class="w-6 h-6"></i>
                </div>
            </div>

            <!-- Action Buttons -->
             {{--
            <div class="flex gap-3 pt-4 border-t">
                <a href="{{ route('salaries.edit', $salary->id) }}" 
                   class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
                    <i data-lucide="pencil" class="w-4 h-4"></i>
                    Edit Gaji
                </a>
            --}}
                <a href="{{ route('salaries.index') }}" 
                   class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali
                </a>
                {{--
                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin menghapus data gaji ini?')"
                            class="flex items-center gap-2 px-6 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all font-semibold">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                        Hapus
                    </button>
                </form>
                --}}
            </div>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection