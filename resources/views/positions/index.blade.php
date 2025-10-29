@extends('employees.master')
@section('title', 'Data Position')
@section('page-title', 'Data Position')
@section('page-subtitle', 'Kelola data jabatan karyawan')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
    <i data-lucide="check-circle" class="w-5 h-5"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

    <!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar position</h2>
        <p class="text-sm text-gray-500 mt-1">Total:
            <span class="font-semibold text-rose">{{ count($positions) }}</span> 
        </p>
    </div>
    <a href="{{ route('positions.create') }}"
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Position
    </a>
</div>

    {{--
    <!-- Action Buttons & Search -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <a href="{{ route('positions.create') }}" 
        class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all font-semibold">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah Position
        </a>

    <div class="relative w-full md:w-64">
        <input type="text" 
               id="searchInput"
               placeholder="Cari jabatan..." 
               class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose focus:border-rose outline-none w-full">
        <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
    </div>
</div>
--}}

<!-- Table Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama Jabatan</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Gaji Pokok</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($positions as $index => $position)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $positions->firstItem() + $index }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $position->nama_jabatan }}</div>
                                @if($position->deskripsi)
                                <div class="text-xs text-gray-500">{{ Str::limit($position->deskripsi, 50) }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
    
                    <td class="px-6 py-4">
                    <div class="flex items-center justify-center gap-2">
                        <!-- Tombol Show/Detail -->
                        <a href="{{ route('positions.show', $position->id) }}" 
                        class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                        </a>
                        
                        <!-- Tombol Edit -->
                        <a href="{{ route('positions.edit', $position->id) }}" 
                        class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                        </a>
                        
                        <!-- Tombol Delete -->
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus posisi ini?')"
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
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-500">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <i data-lucide="inbox" class="w-10 h-10 text-gray-300"></i>
                            </div>
                            <p class="text-lg font-medium text-gray-700">Belum ada data position</p>
                            <p class="text-sm text-gray-500 mt-1">Klik tombol "Tambah Position" untuk menambah data</p>
                            <a href="{{ route('positions.create') }}" 
                               class="mt-4 flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                                Tambah Position Sekarang
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($positions->hasPages())
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $positions->links() }}
    </div>
    @endif
</div>

<script>
    lucide.createIcons();
    
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        let searchValue = this.value.toLowerCase();
        let tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            let positionName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase();
            if (positionName && positionName.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection