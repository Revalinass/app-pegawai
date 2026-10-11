<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')
                                 ->orderBy('tanggal', 'desc')
                                 ->paginate(15);
        
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:hadir,izin,sakit,alpha',
            'keterangan' => 'nullable|string',
        ]);

        Attendance::create($validated);

        return redirect()->route('attendances.index')
                         ->with('success', 'Data kehadiran berhasil ditambahkan!');
    }

    public function show($id)
    {
        $attendance = Attendance::with(['employee', 'employee.position'])->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::where('status', 'aktif')->get();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:hadir,izin,sakit,alpha',
            'keterangan' => 'nullable|string',
        ]);

        $attendance->update($validated);

        return redirect()->route('attendances.index')
                         ->with('success', 'Data kehadiran berhasil diupdate!');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')
                         ->with('success', 'Data kehadiran berhasil dihapus!');
    }
}