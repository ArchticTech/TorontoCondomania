<?php
// Property Controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\Assigment;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return Property::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = now();

        $prop_code = $request->input('prop_code');
        $prop_name = $request->input('prop_name');
        $city_id = $request->input('city_id');
        $development_id = $request->input('development_id');
        $developer_id = $request->input('developer_id');
        $architects_id = $request->input('architects_id');
        $interior_designer_id = $request->input('interior_designer_id');
        $prop_agent_id = $request->input('prop_agent_id');
        $prop_address = $request->input('prop_address');
        $prop_iframe = $request->input('prop_iframe');
        $prop_type = $request->input('prop_type');
        $prop_status = $request->input('prop_status');
        $no_of_stories = $request->input('no_of_stories');
        $no_of_suites = $request->input('no_of_suites');
        $est_occupancy_month = $request->input('est_occupancy_month');
        $est_occupancy_year = $request->input('est_occupancy_year');

        $vip_launch_date = now()->parse($request->input('vip_launch_date'))->toDateString();
        $public_launch_date = now()->parse($request->input('public_launch_date'))->toDateString();
        $const_start_date = now()->parse($request->input('const_start_date'))->toDateString();

        $is_hot = $request->input('is_hot');
        $vip_featured_promotion = $request->input('vip_featured_promotion');
        $is_vip = $is_featured = $is_promotion = 0;

        if ($vip_featured_promotion === 'Vip') {
            $is_vip = 1;
        } elseif ($vip_featured_promotion === 'Featured') {
            $is_featured = 1;
        } elseif ($vip_featured_promotion === 'Promotion') {
            $is_promotion = 1;
        }

        $sale_rent = $request->input('sale_rent');
        $for_sale = $for_rent = 0;

        if ($sale_rent === 'Sale') {
            $for_sale = 1;
        } elseif ($sale_rent === 'Rent') {
            $for_rent = 1;
        }

        $sold_out = $request->input('sold_out');
        $status = $request->input('status');
        $suites_starting_floor = $request->input('suites_starting_floor');
        $suites_per_floor = $request->input('suites_per_floor');
        $floor_plans = $request->input('floor_plans');
        $prop_price_from = $request->input('prop_price_from');
        $prop_price_to = $request->input('prop_price_to');
        $suite_size_from = $request->input('suite_size_from');
        $suite_size_to = $request->input('suite_size_to');
        $ceiling_height = $request->input('ceiling_height');
        $price_per_sqft_from = $request->input('price_per_sqft_from');
        $price_per_sqft_to = $request->input('price_per_sqft_to');
        $parking_price = $request->input('parking_price');
        $locker_price = $request->input('locker_price');
        $min_deposit_percentage = $request->input('min_deposit_percentage');
        $no_of_beds = $request->input('no_of_beds');
        $no_of_baths = $request->input('no_of_baths');

        $image = $request->file('prop_image');
        $prop_imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $prop_imageName);

        $property = new Property([
            'prop_code' => $prop_code,
            'prop_name' => $prop_name,
            'prop_image' => $prop_imageName,
            'city_id' => $city_id,
            'development_id' => $development_id,
            'developer_id' => $developer_id,
            'architects_id' => $architects_id,
            'interior_designer_id' => $interior_designer_id,
            'prop_agent_id' => $prop_agent_id,
            'prop_address' => $prop_address,
            'prop_iframe' => $prop_iframe,
            'prop_type' => $prop_type,
            'prop_status' => $prop_status,
            'no_of_stories' => $no_of_stories,
            'no_of_suites' => $no_of_suites,
            'est_occupancy_month' => $est_occupancy_month,
            'est_occupancy_year' => $est_occupancy_year,
            'vip_launch_date' => $vip_launch_date,
            'public_launch_date' => $public_launch_date,
            'const_start_date' => $const_start_date,
            'is_hot' => $is_hot,
            'is_vip' => $is_vip,
            'is_featured' => $is_featured,
            'is_promotion' => $is_promotion,
            'for_sale' => $for_sale,
            'for_rent' => $for_rent,
            'sold_out' => $sold_out,
            'status' => $status,
            'suites_starting_floor' => $suites_starting_floor,
            'suites_per_floor' => $suites_per_floor,
            'floor_plans' => $floor_plans,
            'prop_price_from' => $prop_price_from,
            'prop_price_to' => $prop_price_to,
            'suite_size_from' => $suite_size_from,
            'suite_size_to' => $suite_size_to,
            'ceiling_height' => $ceiling_height,
            'price_per_sqft_from' => $price_per_sqft_from,
            'price_per_sqft_to' => $price_per_sqft_to,
            'parking_price' => $parking_price,
            'locker_price' => $locker_price,
            'min_deposit_percentage' => $min_deposit_percentage,
            'no_of_beds' => $no_of_beds,
            'no_of_baths' => $no_of_baths
        ]);

        $saved = $property->save();

        if($saved)
        {
            $this->addFeatures($request->input('prop_feature'), $property);
        }

        return [
            'saved' => $saved,   // This will be true or false
            'property' => $property,  // This will be the saved Property object
        ];
    }
    
    public function addFeatures($features, $property)
    {
        foreach($features as $feature) {
            $propertyFeature = new PropertyFeature([
                'prop_feature' => $feature,
                'status' => 1
            ]);
            $propertyFeature->save();

            $property->propertyFeatures()->save($propertyFeature);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return Property::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the property by its ID
        $property = Property::find($id);

        if (!$property) {
            return redirect()->route('admin.property')
                ->with('message', 'Property Not Found');
        }

        // Update the property attributes with new values
        $property->prop_code = $request->input('prop_code');
        $property->prop_name = $request->input('prop_name');
        $property->city_id = $request->input('city_id');
        $property->development_id = $request->input('development_id');
        $property->developer_id = $request->input('developer_id');
        $property->architects_id = $request->input('architects_id');
        $property->interior_designer_id = $request->input('interior_designer_id');
        $property->prop_agent_id = $request->input('prop_agent_id');
        $property->prop_address = $request->input('prop_address');
        $property->prop_iframe = $request->input('prop_iframe');
        $property->prop_type = $request->input('prop_type');
        $property->prop_status = $request->input('prop_status');
        $property->no_of_stories = $request->input('no_of_stories');
        $property->no_of_suites = $request->input('no_of_suites');
        $property->est_occupancy_month = $request->input('est_occupancy_month');
        $property->est_occupancy_year = $request->input('est_occupancy_year');
        $property->vip_launch_date = now()->parse($request->input('vip_launch_date'))->toDateString();
        $property->public_launch_date = now()->parse($request->input('public_launch_date'))->toDateString();
        $property->const_start_date = now()->parse($request->input('const_start_date'))->toDateString();
        $property->is_hot = $request->input('is_hot');

        // Check the VIP, Featured, Promotion status
        $vip_featured_promotion = $request->input('vip_featured_promotion');
        $property->is_vip = ($vip_featured_promotion === 'Vip') ? 1 : 0;
        $property->is_featured = ($vip_featured_promotion === 'Featured') ? 1 : 0;
        $property->is_promotion = ($vip_featured_promotion === 'Promotion') ? 1 : 0;

        // Check the Sale/Rent status
        $sale_rent = $request->input('sale_rent');
        $property->for_sale = ($sale_rent === 'Sale') ? 1 : 0;
        $property->for_rent = ($sale_rent === 'Rent') ? 1 : 0;

        $property->sold_out = $request->input('sold_out');
        $property->status = $request->input('status');
        $property->suites_starting_floor = $request->input('suites_starting_floor');
        $property->suites_per_floor = $request->input('suites_per_floor');
        $property->floor_plans = $request->input('floor_plans');
        $property->prop_price_from = $request->input('prop_price_from');
        $property->prop_price_to = $request->input('prop_price_to');
        $property->suite_size_from = $request->input('suite_size_from');
        $property->suite_size_to = $request->input('suite_size_to');
        $property->ceiling_height = $request->input('ceiling_height');
        $property->price_per_sqft_from = $request->input('price_per_sqft_from');
        $property->price_per_sqft_to = $request->input('price_per_sqft_to');
        $property->parking_price = $request->input('parking_price');
        $property->locker_price = $request->input('locker_price');
        $property->min_deposit_percentage = $request->input('min_deposit_percentage');
        $property->no_of_beds = $request->input('no_of_beds');
        $property->no_of_baths = $request->input('no_of_baths');

        $imagePath = public_path('images/' . $request->input('prop_imageName'));

        if (File::exists($imagePath)) {
            // Delete the image if it exists
            File::delete($imagePath);
        }

        $image = $request->file('prop_image');
        $prop_imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $prop_imageName);
        $property->prop_image = $prop_imageName;

        $saved = $property->save();

        return [
            'saved' => $saved,   // This will be true or false
            'property' => $property,  // This will be the saved Property object
        ];
    }

}
