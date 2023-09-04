<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $table = 'cities';

    protected $fillable = [
        'country_id',
        'city_name',
        'city_image',
        'city_meta_title',
        'city_meta_description',
        'city_meta_keywords',
        'city_description',
        'is_main',
        'for_header',
        'status',
        'created_by',
        'created_date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
