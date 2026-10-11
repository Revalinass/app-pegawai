<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'nama_posisi',
        'gaji_pokok',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
    ];

    // ===== RELASI =====
    
    // 1 Position punya banyak Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id');
    }
}