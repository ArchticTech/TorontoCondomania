
@extends('components.admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Add Assignment</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.assignment.store') }}">
                                    @component('components.admin.propertyForm')

                                        @slot('formName', 'Assignment')

                                        @slot('architects', $architects)
                                        @slot('cities', $cities)
                                        @slot('developers', $developers)
                                        @slot('developments', $developments)
                                        @slot('interiorDesigners', $interiorDesigners)
                                        @slot('propertyAgents', $propertyAgents)
                                        @slot('propertyTypeEnums', $propertyTypeEnums)
                                        @slot('propertyStatusEnums', $propertyStatusEnums)

                                    @endcomponent
                                    {{-- <div class="row">
                                        @csrf
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_code">Assignment Code</label>
                                                <input type="text" required class="form-control" id="prop_code"
                                                    name="prop_code" placeholder="Assignment Code">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_name">Assignment Name</label>
                                                <input type="text" required class="form-control" id="prop_name"
                                                    name="prop_name" placeholder="Assignment Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_image">Assignment Image</label>
                                                <input type="file" required class="form-control" id="prop_image"
                                                    name="prop_image" placeholder="Property Image">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="city_id">Select City</label>
                                            <select name="city_id" required class="form-select" id="city_id">
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="development_id">Select Development</label>
                                            <select name="development_id" required class="form-select" id="development_id">
                                                <option value="">Select Development</option>
                                                @foreach ($developments as $development)
                                                    <option value="{{ $development->id }}">
                                                        {{ $development->development_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="developer_id">Select Developer</label>
                                            <select name="developer_id" required class="form-select" id="developer_id">
                                                <option value="">Select Developer</option>
                                                @foreach ($developers as $developer)
                                                    <option value="{{ $developer->id }}">{{ $developer->developer_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="architects_id">Select Architect</label>
                                            <select name="architects_id" required class="form-select" id="architects_id">
                                                <option value="">Select Architect</option>
                                                @foreach ($architects as $architect)
                                                    <option value="{{ $architect->id }}">
                                                        {{ $architect->architects_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="interior_designer_id">Select interior
                                                Design</label>
                                            <select name="interior_designer_id" required class="form-select"
                                                id="interior_designer_id">
                                                <option value="">Select Interior Designer</option>
                                                @foreach ($interiorDesigners as $interiorDesigner)
                                                    <option value="{{ $interiorDesigner->id }}">
                                                        {{ $interiorDesigner->interior_designer_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_agent_id">Select Property Agent</label>
                                            <select name="prop_agent_id" required class="form-select" id="prop_agent_id">
                                                <option value="">Select Property Agent</option>
                                                @foreach ($propertyAgents as $propertyAgent)
                                                    <option value="{{ $propertyAgent->id }}">
                                                        {{ $propertyAgent->agent_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_type">Select Property Type</label>
                                            <select name="prop_type" required class="form-select" id="prop_type">
                                                <option value="">Select Property Type</option>
                                                @foreach ($propertyTypeEnums as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_status">Select Property Status</label>
                                            <select name="prop_status" required class="form-select" id="prop_status">
                                                <option value="">Select Property Status</option>
                                                @foreach ($propertyStatusEnums as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_stories">No Of Stories</label>
                                                <input type="number" value="0" required class="form-control"
                                                    id="no_of_stories" name="no_of_stories" placeholder="No Of Stories">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_suites">No Of Suites</label>
                                                <input type="number" value="0" required class="form-control"
                                                    id="no_of_suites" name="no_of_suites" placeholder="No Of Suites">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="est_occupancy_month">Estimate Occupency
                                                    Month</label>
                                                <input type="text" class="form-control" id="est_occupancy_month"
                                                    required name="est_occupancy_month"
                                                    placeholder="Estimate Occupency Month">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="est_occupancy_year">Estimate Occupency
                                                Year</label>
                                            <select name="est_occupancy_year" required class="form-select"
                                                id="est_occupancy_year">
                                                <option value="">Estimate Occupency Year</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="vip_launch_date">Vip launch Date <span
                                                        style="font-size: 12px;color: grey;">(If No Vip
                                                        launch Date : 01/01/2020)</span></label>
                                                <input class="form-control" required value="2020-01-01"
                                                    id="vip_launch_date" name="vip_launch_date" type="date"
                                                    placeholder="Vip launch Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="public_launch_date">Public launch Date <span
                                                        style="font-size: 12px;color: grey;">(If No Public
                                                        launch Date : 01/01/2020)</span></label>
                                                <input class="form-control" value="2020-01-01" id="public_launch_date"
                                                    required name="public_launch_date" type="date"
                                                    placeholder="Public launch Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="const_start_date">Construction Start Date <span
                                                        style="font-size: 12px;color: grey;">(If No
                                                        Construction Start Date : 01/01/2020)</span></label>
                                                <input class="form-control" value="2020-01-01" id="const_start_date"
                                                    required name="const_start_date" type="date"
                                                    placeholder="Construction Start Date">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="is_hot">Hot Property</label>
                                            <select name="is_hot" required class="form-select" id="is_hot"
                                                aria-label="Default select example">
                                                <option value="">Hot Property</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="vip_featured_promotion">Vip/Featured/Promotion</label>
                                            <select class="form-select" name="vip_featured_promotion"
                                                id="vip_featured_promotion" required>
                                                <option value="">Vip/Featured/Promotion</option>
                                                <option value="Vip">Vip</option>
                                                <option value="Featured">Featured</option>
                                                <option value="Promotion">Promotion</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sale_rent">Sale/Rent</label>
                                            <select name="sale_rent" required id="sale_rent" class="form-select">
                                                <option value="">Sale/Rent</option>
                                                <option value="Sale">Sale</option>
                                                <option value="Rent">Rent</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sold_out">Sold Out</label>
                                            <select name="sold_out" required id="sold_out" class="form-select">
                                                <option value="">Sold Out</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="status">Status</label>
                                            <select name="status" required id="status" class="form-select">
                                                <option value="">Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">In Active</option>
                                            </select>
                                        </div>


                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suites_starting_floor">Suites Starting
                                                    Floor</label>
                                                <input type="number" class="form-control" id="suites_starting_floor"
                                                    required value="0" name="suites_starting_floor"
                                                    placeholder="Suites Starting Floor">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suites_per_floor">Suites Per Floor</label>
                                                <input type="number" class="form-control" id="suites_per_floor" required
                                                    value="0" name="suites_per_floor"
                                                    placeholder="Suites Per Floor">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="floor_plans">Floor Plans</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="floor_plans" name="floor_plans" placeholder="Floor Plans">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_price_from">Assignment Price From</label>
                                                <input type="number" class="form-control" id="prop_price_from" required
                                                    value="0" name="prop_price_from"
                                                    placeholder="Property Price From">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_price_to">Assignment Price To</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="prop_price_to" name="prop_price_to"
                                                    placeholder="Property Price To">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suite_size_from">Suite Size From</label>
                                                <input type="number" class="form-control" id="suite_size_from" required
                                                    value="0" name="suite_size_from" placeholder="Suite Size From">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suite_size_to">Suite Size To</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="suite_size_to" name="suite_size_to" placeholder="Suite Size To">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="ceiling_height">Ceiling Height</label>
                                                <input type="number" class="form-control" id="ceiling_height" required
                                                    value="0" name="ceiling_height" placeholder="Ceiling Height">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="price_per_sqft_from">Price Per Sq/ft
                                                    From</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="price_per_sqft_from" name="price_per_sqft_from"
                                                    placeholder="Price Per Sq/ft From">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="price_per_sqft_to">Price Per Sq/ft To</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="price_per_sqft_to" name="price_per_sqft_to"
                                                    placeholder="Price Per Sq/ft To">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="parking_price">Parking Price</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="parking_price" name="parking_price" placeholder="Parking Price">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="locker_price">Locker Price</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="locker_price" name="locker_price" placeholder="Locker Price">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_beds">No Of Beds</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="no_of_beds" name="no_of_beds" placeholder="No Of Beds">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_baths">No Of Baths</label>
                                                <input type="number" required value="0" class="form-control"
                                                    id="no_of_baths" name="no_of_baths" placeholder="No Of Baths">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="min_deposit_percentage">Min Deposit
                                                    Percentage</label>
                                                <input type="number" class="form-control" id="min_deposit_percentage"
                                                    required value="0" name="min_deposit_percentage"
                                                    placeholder="Min Deposit Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_unit_no">Assignment Unit No</label>
                                                <input type="number" class="form-control" id="assign_unit_no" required
                                                    value="0" name="assign_unit_no"
                                                    placeholder="Assignment Unit No">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_floor_no">Assignment Floor No</label>
                                                <input type="number" class="form-control" id="assign_floor_no" required
                                                    value="0" name="assign_floor_no"
                                                    placeholder="Assignment Floor No">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_purchase_price">Assignment Purchase No</label>
                                                <input type="number" class="form-control" id="assign_purchase_price"
                                                    required value="0" name="assign_purchase_price"
                                                    placeholder="Assignment Purchase No">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_cooperation_percentage">Assignment Cooperative
                                                    Percentage</label>
                                                <input type="number" class="form-control"
                                                    id="assign_cooperation_percentage" required value="0"
                                                    name="assign_cooperation_percentage"
                                                    placeholder="Assignment Cooperative Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_deposit_paid">Assignment Deposit Paid</label>
                                                <input type="number" class="form-control" id="assign_deposit_paid"
                                                    required value="0" name="assign_deposit_paid"
                                                    placeholder="Assignment Deposit Paid">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_purchased_date">Assign Purchased Date <span
                                                        style="font-size: 12px;color: grey;">(If No Purchased Date :
                                                        01/01/2020)</span></label>
                                                    <input type="date" value="2020-01-01" class="form-control" id="assign_purchased_date"
                                                        required name="assign_purchased_date"
                                                        placeholder="Assignment Purchased Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="assign_tentative_occ_date">Assign Tentative Occ <span
                                                        style="font-size: 12px;color: grey;">(If No Assign Tentative Occ :
                                                        01/01/2020)</span></label>
                                                <input class="form-control" value="2020-01-01"
                                                    id="assign_tentative_occ_date" required
                                                    name="assign_tentative_occ_date" type="date"
                                                    placeholder="Assign Tentative Occ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_description">Assignment Description</label>
                                                <textarea name="prop_description" id="prop_description" rows="5"
                                                    class="form-control tinymce-editor"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_address">Assignment Address</label>
                                                <input type="text" required class="form-control" id="prop_address"
                                                    name="prop_address" placeholder="Assignment Address">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_iframe">Assignment Location Iframe</label>
                                                <textarea name="prop_iframe" required placeholder="Assignment Location Iframe" id="prop_iframe" rows="5"
                                                    class="form-control"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_title">Assignment Meta Title</label>
                                                <textarea name="prop_meta_title" placeholder="Assignment Meta Title" id="prop_meta_title" rows="1"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_description">Assignment Meta Description</label>
                                                <textarea name="prop_meta_description" placeholder="Assignment Meta Description" id="prop_meta_description"
                                                    rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_keywords">Assignment Meta Keywords</label>
                                                <textarea name="prop_meta_keywords" placeholder="Assignment Meta Keywords" id="prop_meta_keywords" rows="1"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_tags">Assignment Meta Tags</label>
                                                <textarea name="prop_meta_tags" placeholder="Property Meta Tags" id="prop_meta_tags" rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment
                                                Features</p>
                                            <table class="table table-bordered table-hover" id="property_feature_table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Assignment Feature</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="property_feature_tbody">

                                                </tbody>
                                            </table>
                                            <button type="button" name="add_property_feature"
                                                style="float: right;padding: 6px 21px;"
                                                id="add_property_feature" class="btn btn-xs btn-success mt-3"><i
                                                class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mt-3 mb-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment Images
                                            </p>
                                            <div class="row" id="property_image_row">

                                            </div>
                                            <button type="button" name="add_property_image"
                                                style="float: right;padding: 6px 21px;"
                                                id="add_property_image" class="btn btn-xs btn-success mt-3"><i
                                                class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                                Assignment Floor Plan</p>
                                            <div id="property_floor_plan_image_row">

                                            </div>
                                            <button type="button" name="add_property_floor_plan"
                                                style="float: right;padding: 6px 21px;"
                                                id="add_property_floor_plan" class="btn btn-xs btn-success mt-3"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3" style="display: flex; align-items: center; justify-content: center">

                                            <button type="submit"
                                                style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                                class="btn btn-success" id="add_property_button">Add
                                                Assignment</button>

                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
