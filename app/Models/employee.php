<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'department',
    ];

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class, 'employee_id');
    }
}
