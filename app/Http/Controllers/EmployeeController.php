<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Salary;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Tampilkan semua employees
    public function index()
    {
        $employees = Employee::with(['department', 'position'])
                             ->orderBy('created_at', 'desc')
                             ->paginate(10);
        
        return view('employees.index', compact('employees'));
    }

    // Form tambah employee
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    // Simpan employee baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'departemen_id' => 'nullable|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $employee = Employee::create($validated);

        // Auto create salary dari position
        $position = Position::find($request->position_id);
        if ($position) {
            Salary::create([
                'employee_id' => $employee->id,
                'periode' => now()->startOfMonth(),
                'gaji_pokok' => $position->gaji_pokok,
                'tunjangan' => 0,
                'potongan' => 0,
            ]);
        }

        return redirect()->route('employees.index')
                         ->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    // Detail employee
    public function show($id)
    {
        $employee = Employee::with(['department', 'position', 'salaries', 'attendances', 'leaves'])
                            ->findOrFail($id);
        
        return view('employees.show', compact('employee'));
    }

    // Form edit employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    // Update employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,' . $id,
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'departemen_id' => 'nullable|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
                         ->with('success', 'Data pegawai berhasil diupdate!');
    }

    // Hapus employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Data pegawai berhasil dihapus!');
    }
}