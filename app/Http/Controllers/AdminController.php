<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;
use App\Models\Architect;
use App\Models\City;
use App\Models\Developer;
use App\Models\Development;
use App\Models\InteriorDesigner;
use App\Models\PropertyAgent;

class AdminController extends Controller
{
    private $propertyController;
    public function __construct(PropertyController $propertyController)
    {
        $this->propertyController = $propertyController;
    }
    public function dashboard()
    {
        return view('admin.index');
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
        return $this->propertyController->store($request);
    }
    public function editProperty($id)
    {
        $property = $this->propertyController->get($id);

        return view('admin.property-edit', ['property' => $property]);
    }
    public function updateProperty(Request $request, $id)
    {
        return $this->propertyController->update($request, $id);
    }
}
