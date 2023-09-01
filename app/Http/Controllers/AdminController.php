<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;

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
        $properties = $this->propertyController->index();

        return view('admin.property-view', ['properties' => $properties]);
    }
    public function addProperty()
    {
        return view('admin.property-add');
    }
    public function editProperty()
    {
        return view('admin.property-edit');
    }
    public function updateProperty()
    {
        return view('admin.property-edit');
    }

    public function storeProperty(Request $request)
    {
        return $this->propertyController->store($request);
    }
}
