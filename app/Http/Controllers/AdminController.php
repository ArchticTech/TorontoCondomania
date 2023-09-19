<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
    private function getFormData()
    {
        return [
            'architects' => Architect::orderby('architects_name', 'asc')->get(),
            'cities' => City::orderBy('city_name', 'asc')->get(),
            'developers' => Developer::orderby('developer_name', 'asc')->get(),
            'developments' => Development::orderby('development_name', 'asc')->get(),
            'interiorDesigners' => InteriorDesigner::orderby('interior_designer_name', 'asc')->get(),
            'propertyAgents' => PropertyAgent::orderby('agent_name', 'asc')->get(),
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
        $properties = PropertyController::all();

        return view('admin.property-view', ['properties' => $properties]);
    }
    public function addProperty()
    {
        $data = $this->getFormData();

        return view('admin.property-add', $data);
    }
    public function storeProperty(Request $request)
    {
        $result = PropertyController::store($request);

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

        $data['property'] = PropertyController::get($id);

        if (!$data['property'])
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
        $result = PropertyController::update($request, $id);

        if ($result['saved']) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Updated Successfully');
        } else {
            return redirect()->route('admin.property.update')->with('message', 'Property Failed to Update');
        }
    }

    // Assignments CRUD

    public function viewAssignments()
    {
        $assignments = AssignmentController::all();

        return view('admin.assigment-view', ['assignments' => $assignments]);
    }

    public function addAssignment()
    {
        $data = $this->getFormData();

        return view('admin.assigment-add', $data);
    }

    public function storeAssignment(Request $request)
    {
        $assignmentSaved = AssignmentController::store($request);

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

        $data['assignment'] = AssignmentController::get($id);

        if (!$data['assignment'])
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
        $assignmentSaved = AssignmentController::update($request, $id);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Updated Successfully');
        } else {
            return redirect()->route('admin.assignment.update')->with('message', 'Assignment Failed to Update');
        }
    }

    public function viewRentals()
    {
        $rentals = RentalController::all();

        return view('admin.rentals-view', ['rentals' => $rentals]);
    }
    public function addRental()
    {
        return view('admin.rentals-add');
    }
    public function storeRental(Request $request)
    {
        $saved = RentalController::store($request);

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
        $rental = RentalController::get($id);

        if (!$rental)
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Not Found!');

        $rentalFeatures = $rental->rentalFeatures;
        $rentalImages = $rental->rentalImages;

        return view('admin.rental-edit', [
            'rental' => $rental,
            'rentalFeatures' => $rentalFeatures, 'rentalImages' => $rentalImages
        ]);
    }
    public function updateRental(Request $request, $id)
    {
        $saved = RentalController::update($request, $id);

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

    // Property Information
    public function propertyInfo()
    {
        $cities = City::paginate(5, ['*'], 'city_page');
        $developments = Development::paginate(5, ['*'], 'development_page');
        $developers = Developer::paginate(5, ['*'], 'developer_page');
        $architects = Architect::paginate(5, ['*'], 'architect_page');
        $interiorDesigners = InteriorDesigner::paginate(5, ['*'], 'interior_designer_page');

        return view('admin.property-info', [
            'cities' => $cities, 'developments' => $developments, 'developers' => $developers, 'architects' => $architects,
            'interiorDesigners' => $interiorDesigners
        ]);
    }

    // Subscription Form
    public function subscriptionForm()
    {
        return view('admin.subscription-form');
    }

    public function login()
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login');
        }
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
                return redirect()->route('admin.login')->with('message', 'Access Denied. You are not an Admin');
            }
        }
        return redirect()->route('admin.login')->with('message', 'Incorrect Email or Password');
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

        return redirect()->route('admin.login')->with('message', 'You are now Registered!');
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('message', 'You have been logged out!');
    }


    //Property Information

    //City
    public function storeCity(Request $request)
    {
        dd($request->all());
    }
    public function updateCity(Request $request,$id)
    {
        dd($request->all());
    }

    //Development
    public function storedevelopment(Request $request)
    {
        dd($request->all());

    }
    public function updatedevelopment(Request $request, $id)
    {
        dd($request->all());

    }
}
