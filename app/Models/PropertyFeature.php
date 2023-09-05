<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $table = 'property_features';

    protected $fillable = [
        'property_id',
        'prop_feature',
        'status',
        'created_by',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
