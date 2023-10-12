<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlanResvervation extends Model
{
    use HasFactory;

    protected $table = 'floor_plan_resvervation';

    protected $fillable = [
        'property_floor_plan_id',
        'tbl_user_id',
        'first_name_1',
        'last_name_1',
        'email_1',
        'phone_number_1',
        'street_address_1',
        'city_1',
        'postal_code_1',
        'occupation_1',
        'photo_1',
        'first_name_2',
        'last_name_2',
        'email_2',
        'phone_number_2',
        'street_address_2',
        'city_2',
        'postal_code_2',
        'occupation_2',
        'photo_2',
        'reservation_status',
    ];
}
