<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointOfSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_channel_id',
        'company_id'
    ];

    // Relation to Booking Channel
    public function booking_channel()
    {
        return $this->belongsTo(BookingChannel::class, 'booking_channel_id');
    }

    // Relation to Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relation to Inventory
    public function inventory_list()
    {
        return $this->belongsTo(Inventory::class, 'company_id', 'company_id');
    }
}
