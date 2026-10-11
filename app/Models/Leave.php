<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
    
    // Relasi ke Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}