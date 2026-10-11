<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Ambil pegawai
        $employee = Employee::with('position')->findOrFail($request->employee_id);
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
            'periode' => 'required', 
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // format ulang periode
        $validated['periode'] = $validated['periode'] . '-01';

        // Ambil pegawai untuk gaji pokok
        $employee = Employee::with('position')->findOrFail($request->employee_id);
        $validated['gaji_pokok'] = $employee->position->gaji_pokok;
        $validated['tunjangan'] = $validated['tunjangan'] ?? 0;
        $validated['potongan'] = $validated['potongan'] ?? 0;

        $salary->update($validated);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diupdate!');
    }

    /**
     * Hapus data gaji
     */
    public function destroy($id)
    {
            $salary = Salary::findOrFail($id);
            $salary->delete();

            return redirect()->route('salaries.index')
                             ->with('success', 'Data gaji berhasil dihapus!');
    
    }

    /**
     * Download Slip Gaji sebagai PDF
     */
    public function downloadSlip($id)
    {
        try {
            $salary = Salary::with(['employee', 'employee.position', 'employee.department'])
                            ->findOrFail($id);
            
            // Validasi employee tidak null
            if (!$salary->employee) {
                return back()->with('error', 'Data pegawai tidak ditemukan untuk slip gaji ini.');
            }
            
            $employee = $salary->employee;
            $bulan = \Carbon\Carbon::parse($salary->periode)->locale('id')->isoFormat('MMMM YYYY');
            $tanggal_cetak = now('Asia/Jakarta')->locale('id')->isoFormat('dddd, DD MMMM YYYY HH:mm') . ' WIB';
            
            $pdf = Pdf::loadView('salaries.slip-pdf', compact('salary', 'employee', 'bulan', 'tanggal_cetak'));
            $pdf->setPaper('a4', 'portrait');
            
            $fileName = 'slip-gaji-' . 
                        str_replace(' ', '-', strtolower($employee->nama_lengkap)) . '-' . 
                        \Carbon\Carbon::parse($salary->periode)->format('Y-m') . '.pdf';
            
            return $pdf->download($fileName);
            
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal generate PDF: ' . $e->getMessage());
        }
    }
}