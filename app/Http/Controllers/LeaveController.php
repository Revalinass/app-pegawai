<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get();
        return view('leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        Leave::create($validated);

        return redirect()->route('leaves.index')
                         ->with('success', 'Pengajuan cuti berhasil ditambahkan!');
    }

    public function show($id)
    {
        $leave = Leave::with('employee')->findOrFail($id);
        return view('leaves.show', compact('leave'));
    }

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        $employees = Employee::where('status', 'aktif')->get();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $leave->update($validated);

        return redirect()->route('leaves.index')
                         ->with('success', 'Data cuti berhasil diupdate!');
    }

    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')
                         ->with('success', 'Data cuti berhasil dihapus!');
    }
}