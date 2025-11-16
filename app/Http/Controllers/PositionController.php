<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::withCount('employees')
                             ->orderBy('gaji_pokok', 'desc')
                             ->paginate(10);
        
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_posisi' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create($validated);

        return redirect()->route('positions.index')
                         ->with('success', 'Posisi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $position = Position::findOrFail($id);

        $validated = $request->validate([
            'nama_posisi' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position->update($validated);

        return redirect()->route('positions.index')
                         ->with('success', 'Posisi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')
                         ->with('success', 'Posisi berhasil dihapus!');
    }
    
    public function show($id)
    {
    $position = Position::with('employees')->findOrFail($id);
    return view('positions.show', compact('position'));
    }
}