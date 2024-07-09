<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    use HasFactory;

    protected $primaryKey = 'asset_id';
    protected $fillable = ['asset_name', 'asset_type', 'description', 'purchase_date', 'last_used_date', 'status'];

    public function usage()
    {
        return $this->hasMany(AssetUsage::class, 'asset_id', 'asset_id');
    }
}
