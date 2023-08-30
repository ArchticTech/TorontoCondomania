<?php

namespace App;

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

    
}
