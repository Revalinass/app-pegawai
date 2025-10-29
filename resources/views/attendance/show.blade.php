@extends('employees.master')

@section('title', 'Detail Absensi')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">
    <!-- Back Button & Title -->
    <div class="mb-6">
        <a href="{{ route('attendance.index') }}" class="flex items-center text-gray-600 hover:text-gray-800 mb-4 transition duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        <h2 class="text-2xl font-bold text-gray-800">Detail Absensi</h2>
        <p class="text-sm text-gray-500 mt-1">Lihat informasi detail absensi</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="bg-pink-500 text-white px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg font-semibold">Informasi Absensi</h3>
            </div>
            <!-- Status Badge -->
            @if($attendance->status == 'hadir')
                <span class="bg-green-100 text-green-800 px-4 py-1.5 rounded-full text-sm font-medium">Hadir</span>
            @elseif($attendance->status == 'izin')
                <span class="bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-sm font-medium">Izin</span>
            @elseif($attendance->status == 'sakit')
                <span class="bg-yellow-100 text-yellow-800 px-4 py-1.5 rounded-full text-sm font-medium">Sakit</span>
            @else
                <span class="bg-red-100 text-red-800 px-4 py-1.5 rounded-full text-sm font-medium">Alfa</span>
            @endif
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <div class="space-y-5">
                <!-- Nama Pegawai -->
                <div class="pb-5 border-b border-gray-200">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Nama Pegawai</label>
                    <p class="text-lg font-semibold text-gray-900">{{ optional($attendance->employee)->nama_lengkap ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mt-1">{{ optional($attendance->employee)->posisi ?? '-' }}</p>
                </div>

                <!-- Tanggal -->
                <div class="pb-5 border-b border-gray-200">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Tanggal</label>
                    <p class="text-base text-gray-900">
                        {{ $attendance->tanggal ? \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') : '-' }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $attendance->tanggal ? \Carbon\Carbon::parse($attendance->tanggal)->locale('id')->isoFormat('dddd') : '-' }}
                    </p>
                </div>

                <!-- Waktu Kehadiran -->
                <div class="pb-5 border-b border-gray-200">
                    <label class="block text-sm font-medium text-gray-500 mb-3">Waktu Kehadiran</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                            <p class="text-xs text-gray-500 mb-1 font-medium">Jam Masuk</p>
                            <p class="text-2xl font-bold text-green-700">{{ $attendance->jam_masuk }}</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                            <p class="text-xs text-gray-500 mb-1 font-medium">Jam Keluar</p>
                            <p class="text-2xl font-bold text-blue-700">
                                {{ $attendance->jam_keluar ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Status Kehadiran -->
                <div class="pb-5 border-b border-gray-200">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Status Kehadiran</label>
                    <p class="text-base text-gray-900 capitalize font-semibold">{{ $attendance->status }}</p>
                </div>

                <!-- Keterangan -->
                <div class="pb-5">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Keterangan</label>
                    @if($attendance->keterangan)
                        <p class="text-base text-gray-800 bg-gray-50 p-4 rounded-lg leading-relaxed border border-gray-100">{{ $attendance->keterangan }}</p>
                    @else
                        <p class="text-sm text-gray-400 italic">Tidak ada keterangan</p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                    {{-- Uncomment jika ingin mengaktifkan tombol Edit
                    <a href="{{ route('attendance.edit', $attendance->id) }}" 
                       class="bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Absensi
                    </a>
                    --}}
                    
                    <a href="{{ route('attendance.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    
                    {{-- Uncomment jika ingin mengaktifkan tombol Hapus
                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-500 hover:bg-red-600 text-white font-medium px-6 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
