<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all(); 
        return view('employees.create', compact('departments')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:100',
        'email' => 'required|email|max:100|unique:employees,email',
        'nomor_telepon' => 'required|string|max:15',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'department_id' => 'nullable|exists:departments,id',
        'posisi' => 'nullable|string|max:100',
        'tanggal_masuk' => 'required|date',
        'status' => 'required|in:aktif,nonaktif',

    ]);

    Employee::create($request->all());

    return redirect()->route('employees.index')->with('success', 'Data berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all(); // ⬅️ ambil semua data departemen
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:100',
        'email' => 'required|email|max:100|unique:employees,email,' . $id,
        'nomor_telepon' => 'required|string|max:15',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'department_id' => 'nullable|exists:departments,id',
        'posisi' => 'nullable|string|max:100',
        'tanggal_masuk' => 'required|date',
        'status' => 'required|in:aktif,nonaktif',

    ]);

    $employee = Employee::findOrFail($id);
    $employee->update($request->all());

    return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Data karyawan berhasil dihapus.');
    }
}