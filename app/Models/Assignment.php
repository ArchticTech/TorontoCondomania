<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Assuming 'id' is the primary key

    protected $fillable = [
        'property_id',
        'assign_unit_no',
        'assign_floor_no',
        'assign_purchase_price',
        'assign_tentative_occ_date',
        'assign_purchased_date',
        'assign_cooperation_percentage',
        'assign_deposit_paid',
        'created_by',
    ];

    protected $dates = [
        'assign_tentative_occ_date',
        'assign_purchased_date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
