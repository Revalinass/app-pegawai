@extends('employees.master')
@section('title', 'Daftar Gaji')
@section('page-title', 'Salary')
@section('page-subtitle', 'Kelola gaji karyawan')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Gaji Pegawai</h2>
        <p class="text-sm text-gray-500 mt-1">Total:
            <span class="font-semibold text-rose">{{ count($salaries) }}</span> data gaji
        </p>
    </div>
    <a href="{{ route('salaries.create') }}"
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Gaji
    </a>
</div>

<!-- Table -->
<div class="bg-white rounded-lg shadow border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Pegawai</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Gaji Pokok</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Tunjangan</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Total Gaji</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Periode</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($salaries as $index => $salary)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-sm text-gray-800">
                        {{ $salary->employee->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        Rp {{ number_format($salary->tunjangan ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-semibold">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        {{ $salary->periode }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Tombol Show/Detail -->
                            <a href="{{ route('salaries.show', $salary->id) }}" 
                               class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                            </a>
                            
                            <!-- Tombol Edit -->
                            <a href="{{ route('salaries.edit', $salary->id) }}" 
                               class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                            </a>
                            
                            <!-- Tombol Delete -->
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus data gaji ini?')"
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
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center">
                            <i data-lucide="inbox" class="w-12 h-12 text-gray-300 mb-3"></i>
                            <p class="font-semibold text-gray-700">Belum ada data gaji</p>
                            <p class="text-sm text-gray-500 mt-1">Silakan tambahkan data gaji pertama</p>
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