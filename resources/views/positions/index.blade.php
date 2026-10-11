@extends('employees.master')
@section('title', 'Daftar Posisi')
@section('page-title', 'Positions')
@section('page-subtitle', 'Kelola data posisi & jabatan')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Posisi</h2>
        <p class="text-sm text-gray-500 mt-1">Total: 
            <span class="font-semibold text-rose">{{ $positions->total() }}</span> posisi
        </p>
    </div>
    <a href="{{ route('positions.create') }}" 
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="briefcase" class="w-4 h-4"></i>
        Tambah Posisi
    </a>
</div>

<!-- Alert Success -->
@if(session('success'))
<div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center gap-2">
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
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Posisi</th>
                    <th class="px-6 py-3 text-right text-xs font-bold text-gray-700">Gaji Pokok</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Jumlah Pegawai</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($positions as $index => $position)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $positions->firstItem() + $index }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-sm text-gray-800">
                        {{ $position->nama_posisi }}
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                            <i data-lucide="users" class="w-3 h-3"></i>
                            {{ $position->employees_count }} orang
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('positions.show', $position->id) }}" 
                               class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                            </a>

                            <a href="{{ route('positions.edit', $position->id) }}" 
                               class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                            </a>
                            
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
                        <i data-lucide="briefcase" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-semibold text-gray-700">Belum ada data posisi</p>
                        <p class="text-sm text-gray-500 mt-1">Silakan tambahkan posisi pertama</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $positions->links() }}
</div>

<script>
    lucide.createIcons();
</script>
@endsection