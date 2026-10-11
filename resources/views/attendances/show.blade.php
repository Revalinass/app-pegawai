@extends('employees.master')
@section('title', 'Detail Absensi')
@section('page-title', 'Detail Absensi')
@section('page-subtitle', 'Informasi lengkap data absensi')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('attendances.index') }}" 
           class="p-2 hover:bg-gray-100 rounded-lg transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Absensi</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap data absensi pegawai</p>
        </div>
    </div>
</div>

<!-- Detail Card -->
<div class="bg-white rounded-lg shadow border overflow-hidden max-w-3xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-rose to-accent p-4 flex items-center justify-between">
        <h3 class="text-white font-semibold flex items-center gap-2">
            <i data-lucide="calendar-check" class="w-5 h-5"></i>
            Informasi Absensi
        </h3>
        <!-- Status Badge -->
        @if($attendance->status == 'hadir')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span> Hadir
            </span>
        @elseif($attendance->status == 'izin')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span> Izin
            </span>
        @elseif($attendance->status == 'sakit')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                <span class="w-2 h-2 bg-blue-500 rounded-full"></span> Sakit
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                <span class="w-2 h-2 bg-red-500 rounded-full"></span> Alpha
            </span>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="space-y-5">
            <!-- Nama Pegawai -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Nama Pegawai</label>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $attendance->employee ? $attendance->employee->nama_lengkap : '-' }}
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $attendance->employee && $attendance->employee->position ? $attendance->employee->position->nama_posisi : '-' }}
                </p>
            </div>

            <!-- Tanggal -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal</label>
                <p class="text-base text-gray-900">
                    {{ $attendance->tanggal ? $attendance->tanggal->format('d F Y') : '-' }}
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $attendance->tanggal ? $attendance->tanggal->locale('id')->isoFormat('dddd') : '-' }}
                </p>
            </div>

            <!-- Waktu Kehadiran -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-3">Waktu Kehadiran</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                        <div class="flex items-center gap-2 mb-2">
                            <i data-lucide="log-in" class="w-4 h-4 text-green-600"></i>
                            <p class="text-xs text-gray-600 font-medium">Jam Masuk</p>
                        </div>
                        <p class="text-2xl font-bold text-green-700">{{ $attendance->jam_masuk ?? '-' }}</p>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                        <div class="flex items-center gap-2 mb-2">
                            <i data-lucide="log-out" class="w-4 h-4 text-blue-600"></i>
                            <p class="text-xs text-gray-600 font-medium">Jam Keluar</p>
                        </div>
                        <p class="text-2xl font-bold text-blue-700">{{ $attendance->jam_keluar ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Status Kehadiran -->
            <div class="pb-5 border-b border-gray-200">
                <label class="block text-sm font-medium text-gray-500 mb-2">Status Kehadiran</label>
                <p class="text-base text-gray-900 capitalize font-semibold">
                    @if($attendance->status == 'hadir')
                        Hadir
                    @elseif($attendance->status == 'izin')
                        Izin
                    @elseif($attendance->status == 'sakit')
                        Sakit
                    @elseif($attendance->status == 'alpha')
                        Alpha
                    @else
                        {{ $attendance->status }}
                    @endif
                </p>
            </div>

            <!-- Keterangan -->
            <div class="pb-5">
                <label class="block text-sm font-medium text-gray-500 mb-2">Keterangan</label>
                @if($attendance->keterangan)
                    <p class="text-base text-gray-800 bg-gray-50 p-4 rounded-lg leading-relaxed border border-gray-200">
                        {{ $attendance->keterangan }}
                    </p>
                @else
                    <p class="text-sm text-gray-400 italic">Tidak ada keterangan</p>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">              
                <a href="{{ route('attendances.index') }}"
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