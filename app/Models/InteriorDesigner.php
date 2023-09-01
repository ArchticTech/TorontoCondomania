<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorDesigner extends Model
{
    use HasFactory;

    protected $fillable = [
        'interior_designer_name',
        'is_main',
        'status',
        'created_by',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
