<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AssignmentController;
use App\Models\Architect;
use App\Models\City;
use App\Models\Developer;
use App\Models\Development;
use App\Models\InteriorDesigner;
use App\Models\PropertyAgent;
use App\Models\Country;
use App\Models\Property;


class AdminController extends Controller
{
    private $propertyController, $assignmentController;
    public function __construct(PropertyController $propertyController, AssignmentController $assignmentController)
    {
        $this->propertyController = $propertyController;
        $this->assignmentController = $assignmentController;
    }
    private function getFormData()
    {
        return [
            'architects' => Architect::all(),
            'cities' => City::all(),
            'developers' => Developer::all(),
            'developments' => Development::all(),
            'interiorDesigners' => InteriorDesigner::all(),
            'propertyAgents' => PropertyAgent::all(),
            'propertyTypeEnums' => Property::getPropertyTypeEnums(),
            'propertyStatusEnums' => Property::getPropertyStatusEnums(),
        ];
    }

    public function dashboard()
    {
        $architects = Architect::count();
        $cities = City::count();
        $country = Country::count();
        $developers = Developer::count();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::count();
        $propertyAgents = PropertyAgent::all();

        return view('admin.index', compact('architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents', 'country'));
    }
    public function viewProperty()
    {
        $properties = $this->propertyController->all();

        return view('admin.property-view', ['properties' => $properties]);
    }
    public function addProperty()
    {
        $data = $this->getFormData();

        return view('admin.property-add', $data);
    }
    public function storeProperty(Request $request)
    {
        $result = $this->propertyController->store($request);

        if ($result['saved']) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Added Successfully');
        } else {
            return redirect()->route('admin.property.add')
                ->with('message', 'Property Failed to Add');
        }
    }
    public function editProperty($id)
    {
        $data = $this->getFormData();

        $data['property'] = $this->propertyController->get($id);
        
        $data['features'] = $data['property']->propertyFeatures;
        $data['details'] = $data['property']->propertyDescriptions;
        $data['images'] = $data['property']->propertyImages;
        $data['floorPlans'] = $data['property']->propertyFloorPlans;

        return view('admin.property-edit', $data);
    }
    public function updateProperty(Request $request, $id)
    {
        $result = $this->propertyController->update($request, $id);

        if ($result['saved']) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Updated Successfully');
        }
        else {
            return redirect()->route('admin.property.update')->with('message', 'Property Failed to Update');
        }   
    }

    // Assignments CRUD

    public function viewAssignments()
    {
        $assignments = $this->assignmentController->all();

        return view('admin.assigment-view', ['assignments' => $assignments]);
    }

    public function addAssignment()
    {
        $data = $this->getFormData();

        return view('admin.assigment-add', $data);
    }

    public function storeAssignment(Request $request)
    {
        $assignmentSaved = $this->assignmentController->store($request);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Added Successfully');
        } else {
            return redirect()->route('admin.assignment.add')
                ->with('message', 'Assignment Failed to Add');
        }
    }
    public function editAssignment($id)
    {
        $data = $this->getFormData();

        $data['assignment'] = $this->assignmentController->get($id);
        
        $data['features'] = $data['assignment']->property->propertyFeatures;
        $data['details'] = $data['assignment']->property->propertyDescriptions;
        $data['images'] = $data['assignment']->property->propertyImages;
        $data['floorPlans'] = $data['assignment']->property->propertyFloorPlans;

        return view('admin.assignment-edit', $data);
    }
    public function updateAssignment(Request $request, $id)
    {
        $assignmentSaved = $this->assignmentController->update($request, $id);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Updated Successfully');
        }
        else {
            return redirect()->route('admin.assignment.update')->with('message', 'Assignment Failed to Update');
        }   
    }
}