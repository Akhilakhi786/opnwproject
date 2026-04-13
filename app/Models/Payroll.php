<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
        'department',
        'salary',
        'bonus',
        'deductions',
        'total'
    ];

    // ✅ Relationship
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }
}