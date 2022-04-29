<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'inventory_type_code_id',
        'rate_plan_code_id',
        'count_type_id',
        'count',
        'start_date',
        'end_date'
    ];

    // Relation to Company
    public function company_list()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relation to Inventory Type Code 
    public function inventory_type_code_list()
    {
        return $this->belongsTo(InventoryTypeCode::class, 'inventory_type_code_id');
    }

    // Relation to Rate Plan Code
    public function rate_plan_code_list()
    {
        return $this->belongsTo(RatePlanCode::class, 'rate_plan_code_id');
    }

    // Relation to Count Type
    public function count_type_list()
    {
        return $this->belongsTo(CountType::class, 'count_type_id');
    }

}
