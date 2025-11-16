@extends('employees.master')
@section('title', 'Daftar Cuti')
@section('page-title', 'Leaves')
@section('page-subtitle', 'Kelola pengajuan cuti pegawai')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Cuti Pegawai</h2>
        <p class="text-sm text-gray-500 mt-1">Total: 
            <span class="font-semibold text-rose">{{ $leaves->total() }}</span> pengajuan cuti
        </p>
    </div>
    <a href="{{ route('leaves.create') }}" 
       class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
        <i data-lucide="calendar-plus" class="w-4 h-4"></i>
        Ajukan Cuti
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
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Nama Pegawai</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Tanggal Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700">Alasan</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($leaves as $index => $leave)
                <tr class="hover:bg-rose/5 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $leaves->firstItem() + $index }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-sm text-gray-800">
                        {{ $leave->employee->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($leave->tanggal_mulai)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($leave->tanggal_selesai)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <div class="max-w-xs">
                            {{ Str::limit($leave->alasan, 50, '...') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($leave->status == 'pending')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span> Pending
                            </span>
                        @elseif($leave->status == 'approved')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Approved
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Rejected
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('leaves.show', $leave->id) }}" 
                               class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Detail</span>
                            </a>
                            
                            @if($leave->status == 'pending')
                            <a href="{{ route('leaves.edit', $leave->id) }}" 
                               class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all group relative">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Edit</span>
                            </a>
                            @endif
                            
                            <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus pengajuan cuti ini?')"
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
                        <i data-lucide="calendar-off" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-semibold text-gray-700">Belum ada pengajuan cuti</p>
                        <p class="text-sm text-gray-500 mt-1">Silakan ajukan cuti pertama</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $leaves->links() }}
</div>

<script>
    lucide.createIcons();
</script>
@endsection