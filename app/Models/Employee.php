<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    'user_id',
    'employee_id',
    'name',
    'designation',
    'department',
    'joining_date',
    'email',
    'address',
    'mobile',
    'aadhar',
    'pan',
    'emergency_contact',
    'bank_name',
    'account_number',
    'ifsc',
    'salary',
];
}