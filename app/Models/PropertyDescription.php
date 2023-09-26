<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDescription extends Model
{
    use HasFactory;

    protected $table = 'property_description';

    protected $fillable = [
        'property_id',
        'prop_description',
        'status',
        'created_by',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
