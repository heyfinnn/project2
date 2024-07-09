<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';
    protected $fillable = ['task_name', 'description', 'due_date', 'status'];

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class, 'task_id', 'task_id');
    }

    public function taskAssets()
    {
        return $this->hasMany(TaskAsset::class, 'task_id', 'task_id');
    }
}
