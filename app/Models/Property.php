<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = [
        'prop_code', 'prop_name', 'prop_image', 'city_id', 'development_id', 'developer_id',
        'architects_id', 'interior_designer_id', 'prop_agent_id', 'prop_address', 'prop_iframe',
        'prop_meta_title', 'prop_meta_description', 'prop_meta_keywords', 'prop_meta_tags',
        'prop_type', 'prop_status', 'no_of_stories', 'no_of_suites', 'est_occupancy_month',
        'est_occupancy_year', 'vip_launch_date', 'public_launch_date', 'const_start_date',
        'is_hot', 'is_vip', 'is_featured', 'is_promotion', 'is_assignment', 'for_sale',
        'for_rent', 'sold_out', 'status', 'created_by', 'created_date'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function architect()
    {
        return $this->belongsTo(Architect::class);
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
        return $this->belongsTo(PropertyAgent::class);
    }

    public function propertyFeatures()
    {
        return $this->hasMany(PropertyFeature::class);
    }
    public function propertyDescriptions()
    {
        return $this->hasMany(PropertyDescription::class);
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
}
