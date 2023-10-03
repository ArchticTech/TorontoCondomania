<?php

namespace App\Http\Controllers;

use App\Http\Resources\BriefAssignmentResource;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\BriefPropertyResource;
use App\Http\Resources\DetailedAssignmentResource;
use App\Http\Resources\DetailedPropertyResource;
use App\Models\City;

class ApiController extends Controller
{
    public function getAllProperties()
    {
        $properties = PropertyController::all();

        $properties = BriefPropertyResource::collection($properties);

        return $properties;
    }
    public function getProperty($slug)
    {
        $property = PropertyController::get($slug);

        $property = DetailedPropertyResource::make($property);

        return $property;
    }
    // Assignments
    public function getAllAssignments()
    {
        $assignments = AssignmentController::all();

        $assignments = BriefAssignmentResource::collection($assignments);

        return $assignments;
    }
    public function getAssignment($id)
    {
        $property = PropertyController::get($id);

        $property = DetailedAssignmentResource::make($property);

        return $property;
    }

    public function getCity($name)
    {
        // $city = City::get($name);

        // $city = Property::all($city);

        // return $city;
        // $city = City::where('city_name', $name)->first();
        $city = City::whereRaw('city_name COLLATE utf8mb4_general_ci LIKE ?', ["%$name%"])->first();

        $propertyCount = 0;
        if ($city) {
            $propertyCount = Property::where('city_id', $city->id)->count();
            // $propertyCount now contains the count of properties in the specified city
        }
        return $propertyCount;
    }
}
