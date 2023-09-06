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


class AdminController extends Controller
{
    private $propertyController, $assigmentController;
    public function __construct(PropertyController $propertyController, AssigmentController $assigmentController)
    {
        $this->propertyController = $propertyController;
        $this->assigmentController = $assigmentController;
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
        $architects = Architect::all();
        $cities = City::all();
        $developers = Developer::all();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::all();
        $propertyAgents = PropertyAgent::all();

        return view('admin.property-add', compact('architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents'));
    }
    public function storeProperty(Request $request)
    {
        $propertySave = $this->propertyController->store($request);

        if ($propertySave) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Added Successfully');
        } else {
            return redirect()->route('admin.property.add')
                ->with('message', 'Property Failed to Add');
        }
    }
    public function editProperty($id)
    {
        $architects = Architect::all();
        $cities = City::all();
        $developers = Developer::all();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::all();
        $propertyAgents = PropertyAgent::all();

        $property = $this->propertyController->get($id);

        return view('admin.property-edit', compact('architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents', 'property'));
    }
    public function updateProperty(Request $request, $id)
    {

        return $this->propertyController->update($request, $id);
    }


    //Assigments CRUD

    public function viewAssigments()
    {
        $assigments = $this->assigmentController->all();

        return view('admin.assigment-view', ['assigments' => $assigments]);
    }

    public function addAssigment()
    {
        $architects = Architect::all();
        $cities = City::all();
        $developers = Developer::all();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::all();
        $propertyAgents = PropertyAgent::all();

        return view('admin.assigment-add', compact('architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents'));
    }

    public function storeAssigment(Request $request)
    {
        $assigmentSave = $this->assigmentController->store($request);


        if ($assigmentSave) {
            return redirect()->route('admin.assigment.view')
                ->with('message', 'Assigment Added Successfully');
        } else {
            return redirect()->route('admin.assigment.add')
                ->with('message', 'Assigment Failed to Add');
        }
    }
    public function editAssigment($id)
    {
        $architects = Architect::all();
        $cities = City::all();
        $developers = Developer::all();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::all();
        $propertyAgents = PropertyAgent::all();

        $assigment = $this->assigmentController->get($id);

        return view('admin.assignment-edit', compact('assigment','architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents'));

    }
    public function updateAssignment(Request $request, $id)
    {

        return $this->propertyController->update($request, $id);
    }
}
