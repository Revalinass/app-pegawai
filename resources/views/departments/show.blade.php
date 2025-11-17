@extends('employees.master')
@section('title', 'Detail Department')
@section('page-title', 'Detail Department')
@section('page-subtitle', 'Informasi lengkap department')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('departments.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Department</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap department</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-2xl">
    <div class="bg-gradient-to-r from-rose to-accent p-4">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="building-2" class="w-5 h-5"></i>
            Informasi Department
        </h3>
    </div>
    
    <div class="p-6">
        <!-- Nama Department -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                <i data-lucide="building" class="w-4 h-4"></i>
                Nama Department
            </label>
            <p class="text-gray-900 text-lg font-medium bg-gray-50 px-4 py-3 rounded-lg border border-gray-200">
                {{ $department->nama_department }}
            </p>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                <i data-lucide="toggle-right" class="w-4 h-4"></i>
                Status
            </label>
            <div class="bg-gray-50 px-4 py-3 rounded-lg border border-gray-200">
                @if($department->status == 'active')
                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                        <i data-lucide="check-circle" class="w-4 h-4"></i>
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                        <i data-lucide="x-circle" class="w-4 h-4"></i>
                        Inactive
                    </span>
                @endif
            </div>
        </div>
        <!-- Buttons -->
        <div class="flex gap-3 pt-4 border-t">    
            <a href="{{ route('departments.index') }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection