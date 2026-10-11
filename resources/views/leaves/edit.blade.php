@extends('employees.master')
@section('title', 'Edit Cuti')
@section('page-title', 'Edit Cuti')
@section('page-subtitle', 'Edit data cuti pegawai')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('leaves.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Data Cuti</h2>
            <p class="text-sm text-gray-500 mt-1">Ubah data pengajuan cuti yang sudah ada</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="edit" class="w-5 h-5"></i>
            Form Edit Cuti
        </h3>
    </div>
    
    <form action="{{ route('leaves.update', $leave->id) }}" method="POST" class="p-6">
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
                        <option value="{{ $employee->id }}" {{ old('employee_id', $leave->employee_id) == $employee->id ? 'selected' : '' }}>
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

            <!-- Tanggal Mulai -->
            <div>
                <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Mulai <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_mulai" 
                       name="tanggal_mulai" 
                       value="{{ old('tanggal_mulai', $leave->tanggal_mulai->format('Y-m-d')) }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tanggal_mulai') border-red-500 @enderror"
                       required>
                @error('tanggal_mulai')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tanggal Selesai -->
            <div>
                <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Selesai <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       id="tanggal_selesai" 
                       name="tanggal_selesai" 
                       value="{{ old('tanggal_selesai', $leave->tanggal_selesai->format('Y-m-d')) }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('tanggal_selesai') border-red-500 @enderror"
                       required>
                @error('tanggal_selesai')
                    <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Alasan -->
            <div class="md:col-span-2">
                <label for="alasan" class="block text-sm font-semibold text-gray-700 mb-2">
                    Alasan <span class="text-red-500">*</span>
                </label>
                <textarea id="alasan" 
                          name="alasan" 
                          rows="4"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('alasan') border-red-500 @enderror" 
                          required>{{ old('alasan', $leave->alasan) }}</textarea>
                @error('alasan')
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
                    <option value="pending" {{ old('status', $leave->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status', $leave->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ old('status', $leave->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
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
                Update Cuti
            </button>
            <a href="{{ route('leaves.index') }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                <i data-lucide="x" class="w-4 h-4"></i>
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    lucide.createIcons();
    
    // Validasi tanggal
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    
    tanggalMulai.addEventListener('change', function() {
        tanggalSelesai.min = this.value;
    });
    
    tanggalSelesai.addEventListener('change', function() {
        if (this.value < tanggalMulai.value) {
            alert('Tanggal selesai tidak boleh sebelum tanggal mulai!');
            this.value = '';
        }
    });
</script>
@endsection