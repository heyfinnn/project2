<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    use HasFactory;
    protected $primaryKey = 'employee_task_id';
    protected $fillable = ['employee_id', 'task_id', 'assigned_date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'task_id');
    }
}
