@extends('components.admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Add Property</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Properties</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.property.store') }}">
                                    <div class="row">
                                        @csrf
                                        <div class="mb-3 mt-3 col-md-4">
                                            <div class="form-group">
                                                <label for="prop_code">Property Code</label>
                                                <input type="text" required class="form-control" id="prop_code"
                                                    name="prop_code" placeholder="Property Code">
                                            </div>
                                        </div>
                                        <div class=" mb-3 mt-3 col-md-4">
                                            <div class="form-group">
                                                <label for="prop_name">Property Name</label>
                                                <input type="text" required class="form-control" id="prop_name"
                                                    name="prop_name" placeholder="Property Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_name">Property Image</label>
                                                <input type="file" required class="form-control" id="prop_image"
                                                    name="prop_image" placeholder="Property Image">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="city_id">Select City</label>
                                            <select name="city_id" class="form-select" id="city_id">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="development_id">Select Development</label>
                                            <select name="development_id" class="form-select" id="development_id">
                                                @foreach ($developments as $development)
                                                    <option value="{{ $development->id }}">
                                                        {{ $development->development_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="developer_id">Select Developer</label>
                                            <select name="developer_id" class="form-select" id="developer_id">
                                                @foreach ($developers as $developer)
                                                    <option value="{{ $developer->id }}">{{ $developer->developer_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="architects_id">Select Architect</label>
                                            <select name="architects_id" class="form-select" id="architects_id">
                                                @foreach ($architects as $architect)
                                                    <option value="{{ $architect->id }}">{{ $architect->architects_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="interior_designer_id">Select interior
                                                Design</label>
                                            <select name="interior_designer_id" class="form-select"
                                                id="interior_designer_id">
                                                @foreach ($interiorDesigners as $interiorDesigner)
                                                    <option value="{{ $interiorDesigner->id }}">
                                                        {{ $interiorDesigner->interior_designer_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_agent_id">Select Property Agent</label>
                                            <select name="prop_agent_id" class="form-select" id="prop_agent_id">
                                                @foreach ($propertyAgents as $propertyAgent)
                                                    <option value="{{ $propertyAgent->id }}">
                                                        {{ $propertyAgent->agent_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_type">Select Property Type</label>
                                            <select name="prop_type" class="form-select" id="prop_type">
                                                <option>Select Property Type</option>
                                                <option value="Condo">Condo</option>
                                                <option value="Townhouse">Townhouse</option>
                                                <option value="Condo-Townhomes">Condo Townhomes</option>
                                                <option value="Single-family">Single family</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_status">Select Property Status</label>
                                            <select name="prop_status" class="form-select" id="prop_status">
                                                <option value="Pre-Construction">Pre-Construction</option>
                                                <option value="Under-Construction">Under-Construction
                                                </option>
                                                <option value="Ready to move">Ready to move</option>
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
                                            <select name="est_occupancy_year" class="form-select"
                                                id="est_occupancy_year">
                                                <option selected>Estimate Occupency Year</option>
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
                                            <label for="hot_property">Hot Property</label>
                                            <select name="is_hot" class="form-select" id="hot_property"
                                                aria-label="Default select example">
                                                {{-- <option selected>Hot Property</option> --}}
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="vip_featured_promotion">Vip/Featured/Promotion</label>
                                            <select class="form-select" name="vip_featured_promotion"
                                                id="vip_featured_promotion" required>
                                                <option value="Vip">Vip</option>
                                                <option value="Featured">Featured</option>
                                                <option value="Promotion">Promotion</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sale_rent">Sale/Rent</label>
                                            <select name="sale_rent" required id="sale_rent" class="form-select">
                                                <option value="Sale" selected>Sale</option>
                                                <option value="Rent">Rent</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sold_out">Sold Out</label>
                                            <select name="sold_out" required id="sold_out" class="form-select">
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="status">Status</label>
                                            <select name="status" required id="status" class="form-select">
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
                                                <label for="prop_price_from">Property Price From</label>
                                                <input type="number" class="form-control" id="prop_price_from" required
                                                    value="0" name="prop_price_from"
                                                    placeholder="Property Price From">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_price_to">Property Price To</label>
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
                                                <label for="min_deposit_percentage">Min Deposit
                                                    Percentage</label>
                                                <input type="number" class="form-control" id="min_deposit_percentage"
                                                    required value="0" name="min_deposit_percentage"
                                                    placeholder="Min Deposit Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_beds">No of Beds</label>
                                                <input type="number" class="form-control" id="no_of_beds"
                                                    required value="0" name="no_of_beds"
                                                    placeholder="No of Beds">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_baths">No of Baths</label>
                                                <input type="number" class="form-control" id="no_of_baths"
                                                    required value="0" name="no_of_baths"
                                                    placeholder="No of Baths">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_address">Property Address</label>
                                                <input type="text" required class="form-control" id="prop_address"
                                                    name="prop_address" placeholder="Property Address">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_iframe">Property Location Iframe</label>
                                                <textarea name="prop_iframe" required placeholder="Property Location Iframe" id="prop_iframe" rows="5"
                                                    class="form-control"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_title">Property Meta Title</label>
                                                <textarea name="prop_meta_title" placeholder="Property Meta Title" id="prop_meta_title" rows="1"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_description">Property Meta
                                                    Description</label>
                                                <textarea name="prop_meta_description" placeholder="Property Meta Description" id="prop_meta_description"
                                                    rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_keywords">Property Meta
                                                    Keywords</label>
                                                <textarea name="prop_meta_keywords" placeholder="Property Meta Keywords" id="prop_meta_keywords" rows="1"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_meta_tags">Property Meta Tags</label>
                                                <textarea name="prop_meta_tags" placeholder="Property Meta Tags" id="prop_meta_tags" rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                                Property Features</p>
                                            <table class="table table-bordered table-hover" id="property_feature_table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Property Feature
                                                        </th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="property_feature_tbody">

                                                </tbody>
                                            </table>
                                            <button type="button" name="add_property_feature"
                                                style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                id="add_property_feature" class="btn btn-xs btn-success mt-2"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                                Property Description</p>
                                            <table class="table table-bordered table-hover" id="property_detail_table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Property
                                                            Description</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="property_detail_tbody">

                                                </tbody>
                                            </table>
                                            <button type="button" name="add_property_detail"
                                                style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                id="add_property_detail" class="btn btn-xs btn-success mt-2"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                                Property Images</p>
                                            <div class="row" id="property_image_row">

                                            </div>
                                            <button type="button" name="add_property_image"
                                                style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                id="add_property_image" class="btn btn-xs btn-success mt-2"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                                Property Floor Plan</p>
                                            <div id="property_floor_plan_image_row">

                                            </div>
                                            <button type="button" name="add_property_floor_plan"
                                                style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                id="add_property_floor_plan" class="btn btn-xs btn-success mt-2"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3" style="display: flex; align-items: center; justify-content: center">

                                            <button type="submit"
                                                style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                                class="btn btn-success" id="add_property_button">Add
                                                Property</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
