@extends('employees.master')
@section('title', 'Edit Gaji')
@section('page-title', 'Edit Gaji')
@section('page-subtitle', 'Edit data gaji pegawai')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('salaries.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Data Gaji</h2>
            <p class="text-sm text-gray-500 mt-1">Ubah data gaji yang sudah ada</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="wallet" class="w-5 h-5"></i>
            Form Edit Gaji
        </h3>
    </div>
    
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pegawai -->
            <div class="md:col-span-2">
                <label for="employee_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Pegawai <span class="text-red-500">*</span>
                </label>
                <select id="employee_id" 
                        name="employee_id" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('employee_id') border-red-500 @enderror"
                        required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id', $salary->employee_id) == $employee->id ? 'selected' : '' }}>
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

            <!-- Periode -->
            <div class="md:col-span-2">
                <label for="periode" class="block text-sm font-semibold text-gray-700 mb-2">
                    Periode (Bulan & Tahun) <span class="text-red-500">*</span>
                </label>
                <input type="month" 
                       id="periode" 
                       name="periode" 
                       value="{{ old('periode', $salary->periode ? $salary->periode->format('Y-m') : '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('periode') border-red-500 @enderror" 
                       required>
                <p class="mt-1 text-xs text-gray-500">Format: Bulan/Tahun (contoh: November 2025)</p>
                @error('periode')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Potongan -->
             <div>
                <label for="gaji_pokok" class="block text-sm font-semibold text-gray-700 mb-2">
                    Potongan
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                    <input type="number" 
                           id="potongan" 
                           name="potongan" 
                           value="{{ old('potongan', 0) }}"
                           class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('potongan') border-red-500 @enderror" 
                           placeholder="0">
                </div>
                @error('potongan')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Gaji Pokok
            <div>
                <label for="gaji_pokok" class="block text-sm font-semibold text-gray-700 mb-2">
                    Gaji Pokok <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                    <input type="number" 
                           id="gaji_pokok" 
                           name="gaji_pokok" 
                           value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
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
                -->

            <!-- Tunjangan -->
            <div>
                <label for="tunjangan" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tunjangan
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                    <input type="number" 
                           id="tunjangan" 
                           name="tunjangan" 
                           value="{{ old('tunjangan', $salary->tunjangan ?? 0) }}"
                           class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tunjangan') border-red-500 @enderror">
                </div>
                @error('tunjangan')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Total Gaji (Auto Calculate) -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Total Gaji (Otomatis)
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                    <input type="text" 
                           id="total_display" 
                           value="Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}"
                           class="w-full pl-12 pr-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 text-gray-700 font-semibold" 
                           readonly>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-6 mt-6 border-t">
            <button type="submit" 
                    class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
                <i data-lucide="save" class="w-4 h-4"></i>
                Update Gaji
            </button>
            <a href="{{ route('salaries.index') }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                <i data-lucide="x" class="w-4 h-4"></i>
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    lucide.createIcons();
    
    // Auto calculate total
    const gajiPokok = document.getElementById('gaji_pokok');
    const tunjangan = document.getElementById('tunjangan');
    const potongan = document.getElementById('potongan');
    const totalDisplay = document.getElementById('total_display');
    
    function hitungTotal() {
        const gp = parseFloat(gajiPokok.value) || 0;
        const tj = parseFloat(tunjangan.value) || 0;
        const pot = parseFloat(potongan.value) || 0;
        const total = gp + tj - pot;
        
        totalDisplay.value = 'Rp ' + total.toLocaleString('id-ID');
    }
    
    gajiPokok.addEventListener('input', hitungTotal);
    tunjangan.addEventListener('input', hitungTotal);
    potongan.addEventListener('input', hitungTotal);
</script>
@endsection