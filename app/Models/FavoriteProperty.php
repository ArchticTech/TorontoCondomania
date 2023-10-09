<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProperty extends Model
{
    use HasFactory;

    // protected $table = 'favorites_property';
    // protected $primaryKey = ['user_id', 'property_id'];

    // protected $fillable = [
    //     'user_id',
    //     'property_id',
    // ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function property()
    // {
    //     return $this->belongsTo(Property::class);
    // }
    protected $table = 'favorites_property';

    // Disable automatic primary key detection
    protected $primaryKey = null;

    // Disable auto-incrementing primary key assumption
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'property_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    // Override the getKeyName method to specify the composite primary key
    public function getKeyName()
    {
        return ['user_id', 'property_id'];
    }
}
