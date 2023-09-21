<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = [
        'prop_code',
        'prop_name',
        'prop_image',
        'description',
        'city_id',
        'development_id',
        'developer_id',
        'architects_id',
        'interior_designer_id',
        'prop_agent_id',
        'prop_address',
        'latitude',
        'longitude',
        'prop_meta_title',
        'prop_meta_description',
        'prop_meta_keywords',
        'prop_meta_tags',
        'prop_type',
        'prop_status',
        'no_of_stories',
        'no_of_suites',
        'est_occupancy_month',
        'est_occupancy_year',
        'vip_launch_date',
        'public_launch_date',
        'const_start_date',
        'vip_featured_promotion',
        'sale_rent',
        'is_hot',
        'is_assignment',
        'sold_out',
        'suites_starting_floor',
        'suites_per_floor',
        'floor_plans',
        'prop_price_from',
        'prop_price_to',
        'suite_size_from',
        'suite_size_to',
        'ceiling_height',
        'price_per_sqft_from',
        'price_per_sqft_to',
        'parking_price',
        'locker_price',
        'min_deposit_percentage',
        'no_of_beds',
        'no_of_baths',
        'status',
        'created_by',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function architect()
    {
        return $this->belongsTo(Architect::class, 'architects_id');
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    public function development()
    {
        return $this->belongsTo(Development::class);
    }
    public function interior_designer()
    {
        return $this->belongsTo(InteriorDesigner::class);
    }
    public function property_agent()
    {
        return $this->belongsTo(PropertyAgent::class, 'prop_agent_id');
    }

    public function propertyFeatures()
    {
        return $this->hasMany(PropertyFeature::class);
    }
    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }
    public function propertyFloorPlans()
    {
        return $this->hasMany(PropertyFloorPlan::class);
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'property_id', 'id');
    }

    public static function getPropertyTypeEnums()
    {
        return ['Condo', 'Townhouse', 'Condo Townhomes', 'Single Family'];
    }
    public static function getPropertyStatusEnums()
    {
        return ['Pre-Construction', 'Under-Construction', 'Ready to move'];
    }
}
