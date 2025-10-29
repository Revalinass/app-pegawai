@extends('employees.master')
@section('title', 'Edit Department')
@section('page-title', 'Edit Department')
@section('page-subtitle', 'Edit data department')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('departments.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Department</h2>
            <p class="text-sm text-gray-500 mt-1">Ubah data department yang sudah ada</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="building-2" class="w-5 h-5"></i>
            Form Edit Department
        </h3>
    </div>
    
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Department -->
        <div class="mb-6">
            <label for="nama_department" class="block text-sm font-semibold text-gray-700 mb-2">
                Nama Department <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="nama_department" 
                   name="nama_department" 
                   value="{{ old('nama_department', $department->nama_department) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('nama_department') border-red-500 @enderror" 
                   placeholder="Contoh: Human Resources"
                   required>
            @error('nama_department')
                <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                Status <span class="text-red-500">*</span>
            </label>
            <select id="status" 
                    name="status" 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose transition-all @error('status') border-red-500 @enderror"
                    required>
                <option value="active" {{ old('status', $department->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $department->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
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
                Update Department
            </button>
            <a href="{{ route('departments.index') }}" 
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