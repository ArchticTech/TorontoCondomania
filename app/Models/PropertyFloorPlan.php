<?php

namespace App\Models;

use App\Http\Resources\FloorPlanResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFloorPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'floor_plan_image',
        'plan_suite_no',
        'plan_suite_name',
        'plan_sq_ft',
        'plan_bath',
        'plan_bed',
        'plan_availability',
        'plan_terrace_balcony',
        'created_by',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function reservations()
    {
        return $this->hasMany(FloorPlanResvervation::class, 'property_floor_plan_id');
    }
}
