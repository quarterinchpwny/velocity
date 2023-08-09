<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'category_code',
        'manufacturer_code',
        'model_code',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(VehicleCategory::class, 'code', 'category_code');
    }
    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacturer::class, 'code', 'manufacturer_code');
    }
    public function model(): HasOne
    {
        return $this->hasOne(VehicleModel::class, 'code', 'model_code');
    }
}
