<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'nama_department',
        'deskripsi',
        'status',
    ];

    // ===== RELASI =====
    
    // 1 Department punya banyak Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}