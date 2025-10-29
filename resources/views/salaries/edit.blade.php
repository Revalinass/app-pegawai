@extends('employees.master')
@section('title', 'Edit Gaji Pegawai')
@section('page-title', 'Salary')
@section('page-subtitle', 'Edit data gaji pegawai')

@section('content')
<div class="bg-white shadow rounded-lg border p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-2">Edit Data Gaji</h2>
    <p class="text-sm text-gray-500 mb-6">Perbarui data gaji pegawai.</p>

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nama Pegawai dari tabel employee -->
        <div>
            <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Pegawai</label>
            <select name="employee_id" id="employee_id" 
                    class="w-full rounded-lg border-gray-300 focus:ring-rose focus:border-rose text-sm"
                    required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" 
                        {{ $employee->id == $salary->employee_id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Gaji Pokok -->
        <div>
            <label for="gaji_pokok" class="block text-sm font-medium text-gray-700 mb-1">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" 
                   value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                   class="w-full rounded-lg border-gray-300 focus:ring-rose focus:border-rose text-sm" required>
        </div>

        <!-- Tunjangan -->
        <div>
            <label for="tunjangan" class="block text-sm font-medium text-gray-700 mb-1">Tunjangan (Opsional)</label>
            <input type="number" name="tunjangan" id="tunjangan"
                   value="{{ old('tunjangan', $salary->tunjangan) }}"
                   class="w-full rounded-lg border-gray-300 focus:ring-rose focus:border-rose text-sm">
        </div>

        <!-- Total Gaji -->
        <div>
            <label for="total_gaji" class="block text-sm font-medium text-gray-700 mb-1">Total Gaji</label>
            <input type="number" name="total_gaji" id="total_gaji" readonly
                   value="{{ old('total_gaji', $salary->total_gaji) }}"
                   class="w-full rounded-lg border-gray-300 bg-gray-100 text-gray-700 text-sm">
        </div>

        <!-- Periode -->
        <div>
            <label for="periode" class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
            <input type="text" name="periode" id="periode" 
                   placeholder="Contoh: Oktober 2025"
                   value="{{ old('periode', $salary->periode) }}"
                   class="w-full rounded-lg border-gray-300 focus:ring-rose focus:border-rose text-sm" required>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('salaries.index') }}"
               class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition-all">
                Batal
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-gradient-to-r from-rose to-accent text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold flex items-center gap-2">
                <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    // Hitung total gaji otomatis
    const gajiPokok = document.getElementById('gaji_pokok');
    const tunjangan = document.getElementById('tunjangan');
    const totalGaji = document.getElementById('total_gaji');

    function updateTotal() {
        const pokok = parseFloat(gajiPokok.value) || 0;
        const bonus = parseFloat(tunjangan.value) || 0;
        totalGaji.value = pokok + bonus;
    }

    gajiPokok.addEventListener('input', updateTotal);
    tunjangan.addEventListener('input', updateTotal);

    // Jalankan saat halaman pertama kali dimuat
    updateTotal();

    lucide.createIcons();
</script>
@endsection