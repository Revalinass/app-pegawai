<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with(['employee.position'])
                          ->orderBy('periode', 'desc')
                          ->paginate(10);
        
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'periode' => 'required|date',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // Set default values
        $validated['tunjangan'] = $validated['tunjangan'] ?? 0;
        $validated['potongan'] = $validated['potongan'] ?? 0;

        Salary::create($validated);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil ditambahkan!');
    }

    public function show($id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::where('status', 'aktif')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'periode' => 'required|date',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $validated['tunjangan'] = $validated['tunjangan'] ?? 0;
        $validated['potongan'] = $validated['potongan'] ?? 0;

        $salary->update($validated);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diupdate!');
    }

    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil dihapus!');
    }
}