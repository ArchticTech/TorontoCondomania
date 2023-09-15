<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\BriefPropertyResource;
use App\Http\Resources\DetailedPropertyResource;

class ApiController extends Controller
{
    public function getAllProperties()
    {
        $properties = PropertyController::all();

        $properties = BriefPropertyResource::collection($properties);
        
        return $properties;
    }
    public function getProperty($id)
    {
        $property = PropertyController::get($id);

        $property = DetailedPropertyResource::make($property);
        
        return $property;
    }
}
