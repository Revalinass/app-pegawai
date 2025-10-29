@extends('employees.master')
@section('title', 'Daftar Department')
@section('page-title', 'Departments')
@section('page-subtitle', 'Kelola data department Anda')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Department</h2>
        <p class="text-sm text-gray-500 mt-1">Total: <span class="font-semibold text-rose">{{ count($departments) }}</span> department</p>
    </div>
    <a href="{{ route('departments.create') }}" 
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="plus-circle" class="w-4 h-4"></i>
        Tambah Department
    </a>
</div>

 {{--
<!-- Quick Stats -->
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="bg-gradient-to-br from-rose/10 to-rose/5 rounded-lg p-4 border border-rose/20">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-rose/20 flex items-center justify-center">
                <i data-lucide="building-2" class="w-5 h-5 text-rose"></i>
            </div>
            <div>
                <p class="text-xs text-gray-600 font-medium">Total Department</p>
                <p class="text-xl font-bold text-rose">{{ count($departments) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-accent/10 to-accent/5 rounded-lg p-4 border border-accent/20">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-accent/20 flex items-center justify-center">
                <i data-lucide="calendar-plus" class="w-5 h-5 text-accent"></i>
            </div>
            <div>
                <p class="text-xs text-gray-600 font-medium">Ditambah Bulan Ini</p>
                <p class="text-xl font-bold text-accent">{{ $departments->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
            </div>
        </div>
    </div>
</div>
    --}}

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
    <i data-lucide="check-circle" class="w-5 h-5"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<!-- Table -->
<div class="bg-white rounded-lg shadow border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Department</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Dibuat</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($departments as $index => $department)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-700">{{ $index + 1 }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-rose to-accent flex items-center justify-center flex-shrink-0">
                                <i data-lucide="building-2" class="w-4 h-4 text-white"></i>
                            </div>
                            <div class="font-semibold text-sm text-gray-800">{{ $department->nama_department }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-700">{{ $department->created_at->format('d/m/Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $department->created_at->format('H:i') }}</div>
                    </td>
                    <td class="px-6 py-4">
                    <div class="flex items-center justify-center gap-2">
                        <!-- Tombol Show/Detail -->
                        <a href="{{ route('departments.show', $department->id) }}" 
                        class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                        </a>
                        
                        <!-- Tombol Edit -->
                        <a href="{{ route('departments.edit', $department->id) }}" 
                        class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                        </a>
                        
                        <!-- Tombol Delete -->
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus departemen ini?')"
                                    class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Hapus</span>
                            </button>
                        </form>
                    </div>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center">
                                <i data-lucide="building-2" class="w-7 h-7 text-gray-400"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Belum ada department</p>
                                <p class="text-sm text-gray-500 mt-1">Mulai dengan menambahkan department pertama Anda</p>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection