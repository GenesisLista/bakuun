<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatePlanCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_type_code_id',
        'rate_plan_code'
    ];

    // Relation to Inventory Type Code
    public function inventory_type_code()
    {
        return $this->belongsTo(InventoryTypeCode::class, 'inventory_type_code_id');
    }

}
