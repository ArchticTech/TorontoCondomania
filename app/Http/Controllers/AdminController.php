<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
use App\Models\User;


class AdminController extends Controller
{
    private $propertyController, $assignmentController, $rentalController;
    public function __construct(PropertyController $propertyController, AssignmentController $assignmentController, RentalController $rentalController)
    {
        $this->propertyController = $propertyController;
        $this->assignmentController = $assignmentController;
        $this->rentalController = $rentalController;
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
        
        if(!$data['property'])
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Not Found!');
        
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

        if(!$data['assignment'])
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Not Found!');
        
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

    public function viewRental()
    {
        $rentals = $this->rentalController->all();

        return view('admin.rentals-view', ['rentals' => $rentals]);
    }
    public function addRental()
    {
        return view('admin.rentals-add');
    }
    public function storeRental(Request $request)
    {
        $saved = $this->rentalController->store($request);

        if ($saved) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Added Successfully!');
        } else {
            return redirect()->route('admin.rentals.add')
                ->with('message', 'Rental Failed to Add!');
        }
    }
    public function editRental($id)
    {
        $rental = $this->rentalController->get($id);

        if(!$rental)
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Not Found!');

        $rentalFeatures = $rental->rentalFeatures;
        $rentalImages = $rental->rentalImages;

        return view('admin.rental-edit', ['rental' => $rental, 
            'rentalFeatures' => $rentalFeatures, 'rentalImages' => $rentalImages]);
    }
    public function updateRental(Request $request, $id)
    {
        $saved = $this->rentalController->update($request, $id);

        if ($saved) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Updated Successfully!');
        } else {
            return redirect()->route('admin.rentals.update')
                ->with('message', 'Rental Failed to Update!');
        } 
    }

    // Consulting form
    public function consultingForm()
    {
        return view('admin.consulting-form');
    }

    // Subscription Form
    public function subscriptionForm()
    {
        return view('admin.subscription-form');
    }

    public function login()
    {
        return view('admin.login');
    }

     //Autenticate User
     public function authenticate(Request $request)
     {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            if (Auth::user()->isAdmin()) {
                // Redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Handle non-admin users (e.g., show an error message)
                Auth::logout();
                return redirect()->route('admin.login')->with('message', 'Access Denied as You are not admin');
            }
        }
     }
 
    //Register Admin
    public function register()
    {
        return view('admin.signup');
    }
 
     public function store(Request $request)
     {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:5',
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        // auth()->login($user);

        return redirect()->route('admin.login')->with('message', 'User created and logged in!');
     }
 
     //Logout User
     public function logout(Request $request)
     {
         auth()->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return redirect('/')->with('message', 'You have been logged out!');
     }
 
}