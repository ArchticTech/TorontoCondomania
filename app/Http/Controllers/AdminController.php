<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\PropertyController;

class AdminController extends Controller
{
    private $propertyController;
    public function __construct(PropertyController $propertyController)
    {
        $this->propertyController = $propertyController;
    }
    public function addProperty()
    {
        $this->propertyController->store();
    }
}
