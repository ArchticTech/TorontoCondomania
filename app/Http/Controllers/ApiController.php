<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\BriefPropertyResource;
use App\Http\Resources\BriefAssignmentResource;
use App\Http\Resources\DetailedPropertyResource;
use App\Http\Resources\DetailedAssignmentResource;

class ApiController extends Controller
{
    //Properties
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

    //Assignments
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
}
