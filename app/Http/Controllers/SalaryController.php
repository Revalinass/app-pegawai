<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required',
        'gaji_pokok' => 'required|numeric',
        'tunjangan' => 'nullable|numeric',
        'periode' => 'required|string',
    ]);

    // Hitung total gaji otomatis
    $totalGaji = $request->gaji_pokok + ($request->tunjangan ?? 0);

    // Simpan ke database
    Salary::create([
        'employee_id' => $request->employee_id,
        'gaji_pokok' => $request->gaji_pokok,
        'tunjangan' => $request->tunjangan ?? 0,
        'total_gaji' => $totalGaji,
        'periode' => $request->periode,
    ]);

    return redirect()
        ->route('salaries.index')
        ->with('success', 'Data gaji berhasil ditambahkan!');
}

    public function show(Salary $salary)
    {
        
        $salary->load('employee');
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'total_gaji' => 'required|numeric',
            'periode' => 'required|string',
        ]);

        $salary->update($request->all());
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
