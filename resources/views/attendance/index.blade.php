@extends('employees.master')
@section('title', 'Data Absensi')
@section('page-title', 'Attendance')
@section('page-subtitle', 'Kelola data absensi pegawai')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Data Absensi</h2>
        <p class="text-sm text-gray-500 mt-1">Total: <span class="font-semibold text-rose">{{ count($attendances) }}</span> catatan</p>
    </div>
    <a href="{{ route('attendance.create') }}" 
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="plus-circle" class="w-4 h-4"></i>
        Tambah Absensi
    </a>
</div>

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
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Pegawai</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Jam Masuk</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Jam Keluar</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($attendances as $index => $attendance)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                <div>
                   <p class="font-semibold text-sm text-gray-800">{{ $attendance->employee->nama_lengkap }}</p>
                   {{--
                   <p class="text-xs text-gray-500">{{ $attendance->employee->posisi }}</p>
                    --}}
                </div>
             </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $attendance->jam_masuk ? \Carbon\Carbon::parse($attendance->jam_masuk)->format('H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $attendance->jam_keluar ? \Carbon\Carbon::parse($attendance->jam_keluar)->format('H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($attendance->status == 'hadir')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">Hadir</span>
                        @elseif($attendance->status == 'izin')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Izin</span>
                        @elseif($attendance->status == 'sakit')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">Sakit</span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">Alfa</span>
                        @endif
                    </td>
                    {{--
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $attendance->keterangan ?? '-' }}
                    </td>
                    --}}
                    <td class="px-6 py-4">
                    <div class="flex items-center justify-center gap-2">
                        <!-- Tombol Show/Detail -->
                        <a href="{{ route('attendance.show', $attendance->id) }}" 
                        class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                        </a>
                        
                        <!-- Tombol Edit -->
                        <a href="{{ route('attendance.edit', $attendance->id) }}" 
                        class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                            <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                        </a>
                        
                        <!-- Tombol Delete -->
                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus data absensi ini?')"
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
                    <td colspan="8" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center">
                                <i data-lucide="user-x" class="w-7 h-7 text-gray-400"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Belum ada data absensi</p>
                                <p class="text-sm text-gray-500 mt-1">Klik tombol "Tambah Absensi" untuk menambah data baru</p>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $attendances->links() }}
</div>

<script>
    lucide.createIcons();
</script>
@endsection
