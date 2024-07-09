<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUsage extends Model
{
    use HasFactory;

    protected $primaryKey = 'usage_id';
    protected $fillable = ['asset_id', 'employee_id', 'use_date', 'return_date', 'purpose'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'asset_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
