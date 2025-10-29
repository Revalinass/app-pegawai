@extends('employees.master')
@section('title', 'Daftar Pegawai')
@section('page-title', 'Employees')
@section('page-subtitle', 'Kelola data pegawai')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Employee</h2>
        <p class="text-sm text-gray-500 mt-1">Total: 
            <span class="font-semibold text-rose">{{ count($employees) }}</span> employees
        </p>
    </div>
    <a href="{{ route('employees.create') }}" 
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="user-plus" class="w-4 h-4"></i>
        Tambah Pegawai
    </a>
</div>

<!-- Table -->
<div class="bg-white rounded-lg shadow border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nomor Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Posisi</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Tanggal Masuk</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($employees as $index => $employee)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-sm text-gray-800">
                        {{ $employee->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $employee->email }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $employee->nomor_telepon }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <div class="max-w-xs">
                            {{ Str::limit($employee->alamat, 50, '...') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $employee->department->nama_department ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $employee->posisi ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($employee->status == 'aktif')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span> Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Tombol Show/Detail -->
                            <a href="{{ route('employees.show', $employee->id) }}" 
                               class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                            </a>
                            
                            <!-- Tombol Edit -->
                            <a href="{{ route('employees.edit', $employee->id) }}" 
                               class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                            </a>
                            
                            <!-- Tombol Delete -->
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus karyawan ini?')"
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
                    <td colspan="10" class="px-6 py-12 text-center">
                        <p class="font-semibold text-gray-700">Belum ada data pegawai</p>
                        <p class="text-sm text-gray-500 mt-1">Silakan tambahkan pegawai pertama</p>
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