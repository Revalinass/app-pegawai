<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menampilkan daftar absensi
    public function index()
    {
        // Ubah jadi $attendances (plural)
        $attendances = Attendance::with('employee')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    // Menampilkan form tambah
    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get();
        return view('attendance.create', compact('employees'));
    }

    // Menyimpan data absensi baru
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'nullable',
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')
            ->with('success', 'Data absensi berhasil ditambahkan');
    }
    
    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::where('status', 'aktif')->get();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    // Update data absensi
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'nullable',
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendance.index')
            ->with('success', 'Data absensi berhasil diupdate');
    }

    // Hapus data absensi
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')
            ->with('success', 'Data absensi berhasil dihapus');
    }
}