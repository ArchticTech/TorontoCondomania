<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;

use App\Models\Assignment;
use App\Models\Property;
use Carbon\Carbon;

class AssigmentController extends Controller
{
    private $propertyController;
    public function __construct(PropertyController $propertyController)
    {
        $this->propertyController = $propertyController;
    }
    public function all()
    {

        $assignments = Assignment::with('property')->get();

        return $assignments;
    }
    public function store(Request $request)
    {
        $property = $this->propertyController->store($request);

        $assignment = new Assignment([
            'property_id' => $property['id'],
            'assign_unit_no' => $request->input('assign_unit_no'),
            'assign_floor_no' => $request->input('assign_floor_no'),
            'assign_purchase_price' => $request->input('assign_purchase_price'),
            'assign_tentative_occ_date' => $request->input('assign_tentative_occ_date'),
            'assign_purchased_date' => $request->input('assign_purchased_date'),
            'assign_cooperation_percentage' => $request->input('assign_cooperation_percentage'),
            'assign_deposit_paid' => $request->input('assign_deposit_paid'),
            'created_by' => 1,
        ]);

        $final = $assignment->save();
        // dd($assignment->assign_unit_no);

        // Associate the assignment with the property
        $property->assignment()->save($assignment);

        return $final;
    }

    public function get($id)
    {
        return Assignment::find($id);
    }
}
