<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('employees')
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10);
        
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_department' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')
                         ->with('success', 'Department berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'nama_department' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')
                         ->with('success', 'Department berhasil diupdate!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')
                         ->with('success', 'Department berhasil dihapus!');
    }
}