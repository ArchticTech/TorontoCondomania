<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'prop_image',
        'prop_image_name',
        'is_assignment',
        'status',
        'created_by',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
