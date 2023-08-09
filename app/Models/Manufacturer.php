<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'code', 'manufacturer_code');
    }
}
