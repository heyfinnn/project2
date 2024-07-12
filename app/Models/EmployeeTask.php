<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'employee_task_id';

    protected $fillable = [
        'employee_id',
        'task_id',
        'asset_id',
        'tool_id',
        'assigned_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
