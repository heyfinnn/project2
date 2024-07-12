<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    use HasFactory;

    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'asset_name',
        'description',
        'stock',
        'purchase_date',
        'last_used_date',
        'location',
        'status',
    ];

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class, 'asset_id');
    }
}
