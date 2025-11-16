<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'departemen_id',
        'position_id',
        'tanggal_masuk',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date',
    ];
    
    // Relasi ke Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    // Relasi ke Position
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    // Relasi ke Salaries (1 employee punya banyak salary)
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'employee_id');
    }

    // Relasi ke Attendances (1 employee punya banyak attendance)
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    // Relasi ke Leaves (1 employee punya banyak leave/cuti)
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_id');
    }
}