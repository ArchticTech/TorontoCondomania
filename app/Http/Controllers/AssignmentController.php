<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Property;
use Carbon\Carbon;

class AssignmentController extends Controller
{
    public static function all()
    {
        $assignments = Assignment::with('property')->latest()->get();

        return $assignments;
    }
    public static function get($slug)
    {
        $assignment = Assignment::whereHas('property', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();
        return $assignment;
    }
    public static function store(Request $request)
    {
        $result = PropertyController::store($request);

        $propertySaved = $result['saved'];
        $property = $result['property'];

        $property->is_assignment = true;
        $property->save();

        $assignment = new Assignment([
            'assign_unit_no' => $request->input('assign_unit_no'),
            'assign_floor_no' => $request->input('assign_floor_no'),
            'assign_purchase_price' => $request->input('assign_purchase_price'),
            'assign_tentative_occ_date' => now()->parse($request->input('assign_tentative_occ_date'))->toDateString(),
            'assign_purchased_date' => now()->parse($request->input('assign_purchased_date'))->toDateString(),
            'assign_cooperation_percentage' => $request->input('assign_cooperation_percentage'),
            'assign_deposit_paid' => $request->input('assign_deposit_paid')
        ]);

        // Associate the assignment with the property
        $assignmentSaved = $property->assignment()->save($assignment);

        return ($assignmentSaved && $propertySaved);
    }
    public static function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $result = PropertyController::update($request, $assignment->property_id);

        $propertySaved = $result['saved'];

        $assignment->assign_unit_no = $request->input('assign_unit_no');
        $assignment->assign_floor_no = $request->input('assign_floor_no');
        $assignment->assign_purchase_price = $request->input('assign_purchase_price');
        $assignment->assign_tentative_occ_date = $request->input('assign_tentative_occ_date');
        $assignment->assign_purchased_date = $request->input('assign_purchased_date');
        $assignment->assign_cooperation_percentage = $request->input('assign_cooperation_percentage');
        $assignment->assign_deposit_paid = $request->input('assign_deposit_paid');

        $assignmentSaved = $assignment->save();

        return ($assignmentSaved && $propertySaved);
    }
}
