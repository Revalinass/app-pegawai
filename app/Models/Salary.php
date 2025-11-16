<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'periode',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    protected $casts = [
        'periode' => 'date',
        'gaji_pokok' => 'decimal:2',
        'tunjangan' => 'decimal:2',
        'potongan' => 'decimal:2',
        'total_gaji' => 'decimal:2',
    ];

    
    // Relasi ke Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    // Auto calculate total_gaji sebelum save
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($salary) {
            // Total = Gaji Pokok + Tunjangan - Potongan
            $salary->total_gaji = ($salary->gaji_pokok + $salary->tunjangan) - $salary->potongan;
        });
    }
}