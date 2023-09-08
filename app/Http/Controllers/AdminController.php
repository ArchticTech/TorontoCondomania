<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AssigmentController;
use App\Models\Architect;
use App\Models\City;
use App\Models\Developer;
use App\Models\Development;
use App\Models\InteriorDesigner;
use App\Models\PropertyAgent;
use App\Models\Country;
use App\Models\Property;
use Carbon\Carbon;


class AdminController extends Controller
{
    private $propertyController, $assigmentController;
    public function __construct(PropertyController $propertyController, AssigmentController $assigmentController)
    {
        $this->assigmentController = $assigmentController;
        $this->propertyController = $propertyController;
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

    //Property CRUD
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
        // dd($request->all());
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

    // Assigments CRUD

    public function viewAssigments()
    {
        $assigments = $this->assigmentController->all();

        return view('admin.assigment-view', ['assigments' => $assigments]);
    }

    public function addAssigment()
    {
        $data = $this->getFormData();

        return view('admin.assigment-add', $data);
    }

    public function storeAssigment(Request $request)
    {

        $assigmentSaved = $this->assigmentController->store($request);

        if ($assigmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assigment Added Successfully');
        } else {
            return redirect()->route('admin.assignment.add')
                ->with('message', 'Assigment Failed to Add');
        }
    }
    public function editAssigment($id)
    {
        $data = $this->getFormData();

        $data['assignment'] = $this->assigmentController->get($id);

        return view('admin.assignment-edit', $data);
    }
    public function updateAssignment(Request $request, $id)
    {
        $assignmentSaved = $this->assigmentController->update($request, $id);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Updated Successfully');
        }
        else {
            return redirect()->route('admin.assignment.update')->with('message', 'Assignment Failed to Update');
        }
    }

    //consulting form
    public function consultingForm()
    {

        return view('admin.consulting-form');
    }

    //subscription Form
    public function subscriptionForm()
    {

        return view('admin.subscription-form');
    }

    public function login()
    {

        return view('admin.login');
    }

}
