<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // ===== RELASI =====
    
    // Relasi ke Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}