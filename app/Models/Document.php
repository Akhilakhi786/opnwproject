<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'employee_id',
        'title',
        'type',
        'file',
        'status'
    ];
    public function employee()
{
    return $this->belongsTo(\App\Models\Employee::class);
}
}