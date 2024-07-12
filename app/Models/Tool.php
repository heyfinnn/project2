<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $primaryKey = 'tool_id';

    protected $fillable = [
        'tool_name',
        'description',
        'purchase_date',
        'last_used_date',
        'status',
    ];

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class, 'tool_id');
    }
}
