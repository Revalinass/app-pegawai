@extends('employees.master')
@section('title', 'Detail Cuti')
@section('page-title', 'Detail Cuti')
@section('page-subtitle', 'Informasi lengkap pengajuan cuti')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('leaves.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Pengajuan Cuti</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data cuti pegawai</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4 flex items-center justify-between">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="calendar-check" class="w-5 h-5"></i>
            Informasi Pengajuan Cuti
        </h3>
        <!-- Status Badge -->
        @if($leave->status == 'pending')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span> Pending
            </span>
        @elseif($leave->status == 'approved')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span> Approved
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                <span class="w-2 h-2 bg-red-500 rounded-full"></span> Rejected
            </span>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-5">
            <!-- Nama Pegawai -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Nama Pegawai</label>
                <p class="text-lg font-semibold text-gray-900">{{ $leave->employee->nama_lengkap }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $leave->employee->position->nama_posisi ?? '-' }}</p>
            </div>

            <!-- Periode Cuti -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Periode Cuti</label>
                <div class="flex items-center gap-3 text-gray-900">
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-gray-400"></i>
                        <span class="font-semibold">{{ $leave->tanggal_mulai->format('d F Y') }}</span>
                    </div>
                    <span class="text-gray-400">—</span>
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-gray-400"></i>
                        <span class="font-semibold">{{ $leave->tanggal_selesai->format('d F Y') }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    Durasi: <span class="font-semibold">{{ $leave->tanggal_mulai->diffInDays($leave->tanggal_selesai) + 1 }} hari</span>
                </p>
            </div>

            <!-- Alasan -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Alasan Cuti</label>
                <p class="text-base text-gray-900 leading-relaxed">{{ $leave->alasan }}</p>
            </div>

            <!-- Status -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Status Pengajuan</label>
                @if($leave->status == 'pending')
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                            <i data-lucide="clock" class="w-4 h-4"></i> Menunggu Persetujuan
                        </span>
                    </div>
                @elseif($leave->status == 'approved')
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                            <i data-lucide="check-circle" class="w-4 h-4"></i> Disetujui
                        </span>
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                            <i data-lucide="x-circle" class="w-4 h-4"></i> Ditolak
                        </span>
                    </div>
                @endif
            </div>

            <!-- Tanggal Pengajuan -->
            <div class="pb-5">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal Pengajuan</label>
                <p class="text-base text-gray-900">{{ $leave->created_at->format('d F Y, H:i') }} WIB</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                @if($leave->status == 'pending')
                @endif
                
                <a href="{{ route('leaves.index') }}" 
                   class="flex items-center justify-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all font-semibold">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection