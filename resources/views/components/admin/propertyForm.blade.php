<div class="row">
    @csrf
    <div class="mb-3 mt-3 col-md-4">
        <div class="form-group">
            <label for="prop_code">{{ $formName }} Code</label>
            <input type="text" required class="form-control" id="prop_code" name="prop_code"
                placeholder="{{ $formName }} Code"
                @isset($property)
                  value="{{ $property->prop_code }}"
                @endisset />
        </div>
    </div>
    <div class=" mb-3 mt-3 col-md-4">
        <div class="form-group">
            <label for="prop_name">{{ $formName }} Name</label>
            <input type="text" required class="form-control" id="prop_name" name="prop_name"
                placeholder="{{ $formName }} Name"
                @isset($property)
                  value="{{ $property->prop_name }}"
                @endisset />
        </div>
    </div>

    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_name">{{ $formName }} Image</label>
            @if (isset($property))
            <input type="file" class="form-control" id="prop_image" name="prop_image" placeholder="Property Image">

                <input type="hidden" name="prop_imageName" value="{{ $property->prop_image }}">

                <img class="img img-fluid my-2" width="253px" src="{{ asset('images/' . $property->prop_image) }}" />
            @else
            <input type="file" class="form-control" id="prop_image" name="prop_image"
            placeholder="{{ $formName }} Image" />
            @endif
            {{-- @isset($property)
                value="{{ $property->prop_image }}"
                <input type="file" class="form-control" id="prop_image" name="prop_image" placeholder="Property Image">

                <input type="hidden" name="prop_imageName" value="{{ $property->prop_image }}">

                <img class="img img-fluid my-2" width="253px" src="{{ asset('images/' . $property->prop_image) }}" />
            @endisset --}}
        </div>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="city_id">Select City</label>
        <select name="city_id" required class="form-select" id="city_id">
            <option value="">Select City</option>
            @foreach ($cities as $city)
                <option
                    @isset($property)
                                                {{ $property['city_id'] == $city->id ? 'selected' : '' }}
                                              @endisset
                    value="{{ $city->id }}">{{ $city->city_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="development_id">Select Development</label>
        <select name="development_id" required class="form-select" id="development_id">
            <option value="">Select Development</option>
            @foreach ($developments as $development)
                <option
                    @isset($property)
                                                        {{ $property['development_id'] == $development->id ? 'selected' : '' }}
                                                     @endisset
                    value="{{ $development->id }}">
                    {{ $development->development_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="developer_id">Select Developer</label>
        <select name="developer_id" required class="form-select" id="developer_id">
            <option value="">Select Developer</option>
            @foreach ($developers as $developer)
                <option
                    @isset($property)
                                                {{ $property['developer_id'] == $developer->id ? 'selected' : '' }}
                                                     @endisset
                    value="{{ $developer->id }}">{{ $developer->developer_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="architects_id">Select Architect</label>
        <select name="architects_id" required class="form-select" id="architects_id">
            <option value="">Select Architect</option>
            @foreach ($architects as $architect)
                <option
                    @isset($property)
                                                {{ $property['architects_id'] == $architect->id ? 'selected' : '' }}
                                                     @endisset
                    value="{{ $architect->id }}">
                    {{ $architect->architects_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="interior_designer_id">Select interior
            Design</label>
        <select name="interior_designer_id" required class="form-select" id="interior_designer_id">
            <option value="">Select Interior Designer</option>
            @foreach ($interiorDesigners as $interiorDesigner)
                <option
                    @isset($property)
                                                {{ $property['interior_designer_id'] == $interiorDesigner->id ? 'selected' : '' }}
                                                     @endisset
                    value="{{ $interiorDesigner->id }}">
                    {{ $interiorDesigner->interior_designer_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="prop_agent_id">Select {{ $formName }} Agent</label>
        <select name="prop_agent_id" required class="form-select" id="prop_agent_id">
            <option value="">Select {{ $formName }} Agent</option>
            @foreach ($propertyAgents as $propertyAgent)
                <option
                    @isset($property)
                                                {{ $property['prop_agent_id'] == $propertyAgent->id ? 'selected' : '' }}
                                                     @endisset
                    value="{{ $propertyAgent->id }}">
                    {{ $propertyAgent->agent_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="prop_type">Select {{ $formName }} Type</label>
        <select name="prop_type" required class="form-select" id="prop_type">
            <option value="">Select {{ $formName }} Type</option>
            @if (isset($property))
                <option value="Condo" @if ($property->prop_type == 'Condo') selected @endif>Condo
                </option>
                <option value="Townhouse" @if ($property->prop_type == 'Townhouse') selected @endif>
                    Townhouse</option>
                <option value="Condo Townhomes" @if ($property->prop_type == 'Condo Townhomes') selected @endif>Condo Townhomes
                </option>
                <option value="Single Family" @if ($property->prop_type == 'Single Family') selected @endif>Single family
                </option>
            @else
                @foreach ($propertyTypeEnums as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="prop_status">Select {{ $formName }} Status</label>
        <select name="prop_status" required class="form-select" id="prop_status">
            <option value="">Select {{ $formName }} Status</option>
            @if (isset($property))
                <option value="Pre-Construction" @if ($property->prop_status == 'Pre-Construction') selected @endif>Pre-Construction
                </option>
                <option value="Under-Construction" @if ($property->prop_status == 'Under-Construction') selected @endif>
                    Under-Construction
                </option>
                <option value="Ready to move" @if ($property->prop_status == 'Ready to move') selected @endif>Ready to move</option>
            @else
                @foreach ($propertyStatusEnums as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            @endif

        </select>
    </div>

    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="no_of_stories">No Of Stories</label>
            <input type="number"
                @isset($property)
                                            value="{{ $property->no_of_stories }}"
                                                     @endisset
                value="0" required class="form-control" id="no_of_stories" name="no_of_stories"
                placeholder="No Of Stories">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="no_of_suites">No Of Suites</label>
            <input type="number"
                @isset($property)
                                            value="{{ $property->no_of_suites }}"
                                                     @endisset
                value="0" required class="form-control" id="no_of_suites" name="no_of_suites"
                placeholder="No Of Suites">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="est_occupancy_month">Estimate Occupency
                Month</label>
            <input type="text"
                @isset($property)
                                            value="{{ $property->est_occupancy_month }}"
                                                     @endisset
                class="form-control" id="est_occupancy_month" required name="est_occupancy_month"
                placeholder="Estimate Occupency Month">
        </div>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="est_occupancy_year">Estimate Occupency
            Year</label>
        <select name="est_occupancy_year" class="form-select" id="est_occupancy_year">
            @if (isset($property))
                <option value="2022" @if ($property->est_occupancy_year == '2022') selected @endif>2022
                </option>
                <option value="2023" @if ($property->est_occupancy_year == '2023') selected @endif>2023
                </option>
                <option value="2024" @if ($property->est_occupancy_year == '2024') selected @endif>2024
                </option>
                <option value="2025" @if ($property->est_occupancy_year == '2025') selected @endif>2025
                </option>
                <option value="2026" @if ($property->est_occupancy_year == '2026') selected @endif>2026
                </option>
                <option value="2027" @if ($property->est_occupancy_year == '2027') selected @endif>2027
                </option>
                <option value="2028" @if ($property->est_occupancy_year == '2028') selected @endif>2028
                </option>
                <option value="2029" @if ($property->est_occupancy_year == '2029') selected @endif>2029
                </option>
                <option value="2030" @if ($property->est_occupancy_year == '2030') selected @endif>2030
                </option>
            @else
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
            @endif
        </select>
    </div>

    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="vip_launch_date">Vip launch Date <span style="font-size: 12px;color: grey;">(If No Vip
                    launch Date : 01/01/2020)</span></label>
            <input class="form-control" required
                @isset($property)
                                            value="{{ $property->vip_launch_date }}"
                                                     @endisset
                id="vip_launch_date" name="vip_launch_date" type="date" placeholder="Vip launch Date">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="public_launch_date">Public launch Date <span style="font-size: 12px;color: grey;">(If No
                    Public
                    launch Date : 01/01/2020)</span></label>
            <input class="form-control"
                @isset($property)
                                            value="{{ $property->public_launch_date }}"
                                                     @endisset
                id="public_launch_date" required name="public_launch_date" type="date"
                placeholder="Public launch Date">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="const_start_date">Construction Start Date <span style="font-size: 12px;color: grey;">(If
                    No
                    Construction Start Date : 01/01/2020)</span></label>
            <input class="form-control" id="const_start_date" required name="const_start_date"
                @isset($property)
                                            value="{{ $property->const_start_date }}"
                                                     @endisset
                type="date" placeholder="Construction Start Date">
        </div>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="hot_property">Hot Property</label>
        <select name="is_hot" class="form-select" id="hot_property" aria-label="Default select example">
            @if (isset($property))
                <option value="1" @if ($property->is_hot == '1') selected @endif>Yes
                </option>
                <option value="0" @if ($property->is_hot == '0') selected @endif>No
                </option>
            @else
                <option value="">Hot Property</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            @endif
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="vip_featured_promotion">Vip/Featured/Promotion</label>
        <select class="form-select" name="vip_featured_promotion" id="vip_featured_promotion" required>
            @if (isset($property))
                <option value="Vip" @if ($property->vip_featured_promotion == 'Vip') selected @endif>Vip
                </option>
                <option value="Featured" @if ($property->vip_featured_promotion == 'Featured') selected @endif>
                    Featured</option>
                <option value="Promotion" @if ($property->vip_featured_promotion == 'Promotion') selected @endif>
                    Promotion</option>
            @else
                <option value="">Vip/Featured/Promotion</option>
                <option value="Vip">Vip</option>
                <option value="Featured">Featured</option>
                <option value="Promotion">Promotion</option>
            @endif
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="sale_rent">Sale/Rent</label>
        <select name="sale_rent" required id="sale_rent" class="form-select">
            @if (isset($property))
                <option value="Sale" @if ($property->sale_rent == 'Sale') selected @endif>Sale
                </option>
                <option value="Rent" @if ($property->sale_rent == 'Rent') selected @endif>Rent
                </option>
            @else
                <option value="">Sale/Rent</option>
                <option value="Sale">Sale</option>
                <option value="Rent">Rent</option>
            @endif
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="sold_out">Sold Out</label>
        <select name="sold_out" required id="sold_out" class="form-select">
            @if (isset($property))
                <option value="1" @if ($property->sold_out == 1) selected @endif>Yes
                </option>
                <option value="0" @if ($property->sold_out == 0) selected @endif>No
                </option>
            @else
                <option value="">Sold Out</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            @endif
        </select>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label for="status">Status</label>
        <select name="status" required id="status" class="form-select">
            @if (isset($property))
                <option value="1" @if ($property->status == 1) selected @endif>
                    Active</option>
                <option value="0" @if ($property->status == 0) selected @endif>In
                    Active</option>
            @else
                <option value="">Status</option>
                <option value="1">Active</option>
                <option value="0">In Active</option>
            @endif
        </select>
    </div>


    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="suites_starting_floor">Suites Starting
                Floor</label>
            <input type="number" class="form-control" id="suites_starting_floor" required
                @isset($property)
                                            value="{{ $property->suites_starting_floor }}"
                                                     @endisset
                value="0" name="suites_starting_floor" placeholder="Suites Starting Floor">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="suites_per_floor">Suites Per Floor</label>
            <input type="number" class="form-control" id="suites_per_floor" required
                @isset($property)
                                            value="{{ $property->suites_per_floor }}"
                                                     @endisset
                value="0" name="suites_per_floor" placeholder="Suites Per Floor">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="floor_plans">Floor Plans</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->floor_plans }}"
                                                     @endisset
                value="0" class="form-control" id="floor_plans" name="floor_plans" placeholder="Floor Plans">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_price_from">{{ $formName }} Price From</label>
            <input type="number" class="form-control" id="prop_price_from" required
                @isset($property)
                                            value="{{ $property->prop_price_from }}"
                                                     @endisset
                value="0" name="prop_price_from" placeholder="{{ $formName }} Price From">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_price_to">{{ $formName }} Price To</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->prop_price_to }}"
                                                     @endisset
                value="0" class="form-control" id="prop_price_to" name="prop_price_to"
                placeholder="{{ $formName }} Price To">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="suite_size_from">Suite Size From</label>
            <input type="number" class="form-control" id="suite_size_from" required
                @isset($property)
                                            value="{{ $property->suite_size_from }}"
                                                     @endisset
                value="0" name="suite_size_from" placeholder="Suite Size From">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="suite_size_to">Suite Size To</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->suite_size_to }}"
                                                     @endisset
                value="0" class="form-control" id="suite_size_to" name="suite_size_to"
                placeholder="Suite Size To">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="ceiling_height">Ceiling Height</label>
            <input type="number" class="form-control" id="ceiling_height" required
                @isset($property)
                                            value="{{ $property->ceiling_height }}"
                                                     @endisset
                value="0" name="ceiling_height" placeholder="Ceiling Height">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="price_per_sqft_from">Price Per Sq/ft
                From</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->price_per_sqft_from }}"
                                                     @endisset
                value="0" class="form-control" id="price_per_sqft_from" name="price_per_sqft_from"
                placeholder="Price Per Sq/ft From">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="price_per_sqft_to">Price Per Sq/ft To</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->price_per_sqft_to }}"
                                                     @endisset
                value="0" class="form-control" id="price_per_sqft_to" name="price_per_sqft_to"
                placeholder="Price Per Sq/ft To">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="parking_price">Parking Price</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->parking_price }}"
                                                     @endisset
                value="0" class="form-control" id="parking_price" name="parking_price"
                placeholder="Parking Price">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="locker_price">Locker Price</label>
            <input type="number" required
                @isset($property)
                                            value="{{ $property->locker_price }}"
                                                     @endisset
                value="0" class="form-control" id="locker_price" name="locker_price"
                placeholder="Locker Price">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="min_deposit_percentage">Min Deposit
                Percentage</label>
            <input type="number" class="form-control" id="min_deposit_percentage" required
                @isset($property)
                                            value="{{ $property->min_deposit_percentage }}"
                                                     @endisset
                value="0" name="min_deposit_percentage" placeholder="Min Deposit Percentage">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="no_of_beds">No of Beds</label>
            <input type="number" class="form-control" id="no_of_beds" required
                @isset($property)
                                            value="{{ $property->no_of_beds }}"
                                                     @endisset
                value="0" name="no_of_beds" placeholder="No of Beds">
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="no_of_baths">No of Baths</label>
            <input type="number" class="form-control" id="no_of_baths" required
                @isset($property)
                                            value="{{ $property->no_of_baths }}"
                                                     @endisset
                value="0" name="no_of_baths" placeholder="No of Baths">
        </div>
    </div>
    {{-- @isset($assignment)
                                    @component('components.admin.assignmentForm')
                                        @slot('formName', 'Assignment')

                                        @slot('assignment', $assignment)
                                    @endcomponent
                                @endisset --}}
    @if ($formName === 'Assignment')
        @component('components.admin.assignmentForm')
            @slot('formName', 'Assignment')

            @isset($assignment)
                @slot('assignment', $assignment)
            @endisset
        @endcomponent

    @endif

    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_description">{{ $formName }} Description</label>
            <textarea name="prop_description" id="prop_description" rows="5" class="form-control tinymce-editor">
@isset($property)
{{ $property->description }}
@endisset
</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_address">{{ $formName }} Address</label>
            <input type="text" required class="form-control" id="prop_address" name="prop_address"
                @isset($property)
                                                value="{{ $property->prop_address }}"
                                            @endisset
                placeholder="{{ $formName }} Address">
        </div>
    </div>
    <div class="mb-3 mt-3" style="">
        <div class="form-group">
            <label for="prop_iframe">{{ $formName }} Location</label>
            {{-- <input type="text" class="form-control searchInput" id="addressInput" placeholder="Find address">
                                            <button class="bx bx-search form-control-feedback" id="geocodeButton"></button> --}}
            <div class="form-group has-search">
                <button class="bx bx-search form-control-feedback" id="geocodeButton"></button>
                <input type="text" class="form-control" id="addressInput" placeholder="Find address">

                <div id="recommendations"></div>
            </div>
            <div id="mapbox" style="width: 100%; height: 400px;"></div>
            <input
                @isset($property)
                  value="{{ $property->latitude }}"
                @endisset
                type="hidden" id="latInput" name="latitude">
            <input
                @isset($property)
                                                value="{{ $property->longitude }}"
                                            @endisset
                type="hidden" id="longInput" name="longitude">
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_meta_title">{{ $formName }} Meta Title</label>
            <textarea name="prop_meta_title" placeholder="{{ $formName }} Meta Title" id="prop_meta_title" rows="1"
                class="form-control">@isset($property){{ $property->prop_meta_title }}@endisset</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_meta_description">{{ $formName }} Meta
                Description</label>
            <textarea name="prop_meta_description" id="prop_meta_description" placeholder="{{ $formName }} Meta Description"
                class="form-control">@isset($property){{ $property->prop_meta_description }}@endisset</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_meta_keywords">{{ $formName }} Meta
                Keywords</label>
            <textarea name="prop_meta_keywords" placeholder="{{ $formName }} Meta Keywords" id="prop_meta_keywords"
                rows="1" class="form-control">@isset($property){{ $property->prop_meta_keywords }}@endisset</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="prop_meta_tags">{{ $formName }} Meta Tags</label>
            <textarea name="prop_meta_tags" placeholder="{{ $formName }} Meta Tags" id="prop_meta_tags" rows="3"
                class="form-control">@isset($property){{ $property->prop_meta_tags }}@endisset</textarea>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
            {{ $formName }} Features</p>
        <table class="table table-bordered table-hover" id="property_feature_table">
            <thead>
                <tr>
                    <th style="text-align: center;">{{ $formName }} Feature
                    </th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="property_feature_tbody">
                @if (isset($property))
                    @foreach ($features as $feature)
                        <tr id="row{{ $loop->iteration }}">
                            <td><input type="text" placeholder="Property Feature" name="prop_feature[]"
                                    class="form-control prop_feature" value="{{ $feature->prop_feature }}" /></td>
                            <td style="text-align: center;">
                                <button type="button" style="padding: 6px 10px 6px 10px;"
                                    name="btn_remove_prop_feature" id="{{ $loop->iteration }}"
                                    class="btn btn-xs btn-danger btn_remove_prop_feature"><i
                                        class="bx bxs-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                @endif
            </tbody>
        </table>
        <button type="button" name="add_property_feature" style="float: right;padding: 6px 21px;"
            id="add_property_feature" class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
            {{ $formName }} Images</p>
        <div class="row" id="property_image_row">
            @if (isset($property))
                @foreach ($images as $image)
                    <div class="col-md-4" id="image_row{{ $loop->iteration }}">
                        <div class="form-group">
                            <label for="prop_name">
                                Property Image {{ $loop->iteration }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" style="padding: 6px 10px" name="btn_remove_prop_image"
                                    id="{{ $loop->iteration }}"
                                    class="btn btn-xs btn-danger m-1 btn_remove_prop_image"><i
                                        class="bx bxs-trash"></i></button>
                            </label>
                            <input type="hidden" name="propertyImageName[]" value="{{ $image->image }}" />
                            <img class="img img-fluid my-2" width="253px"
                                src="{{ asset('images/' . $image->image) }}" />
                        </div>
                    </div>
                @endforeach
            @else
            @endif
        </div>
        <button type="button" name="add_property_image" style="float: right;padding: 6px 21px;"
            id="add_property_image" class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
            {{ $formName }} Floor Plan</p>
        <div id="property_floor_plan_image_row">
            @if (isset($property))
                @foreach ($floorPlans as $floorPlan)
                    <div class="row" id="property_floor_plan_row{{ $loop->iteration }}">
                        <div class="col-12">
                            <h5 class="mb-0 mt-3">Floor Plan {{ $loop->iteration }}</h5>
                        </div>

                        <input type="hidden" name="floorPlanID[]" value="{{ $floorPlan->id }}" />

                        <div class="col-md-3 my-3">
                            <div class="form-group">
                                <label for="plan_suite_no">Suite No</label>
                                <input readOnly value="{{ $floorPlan->plan_suite_no }}" type="text"
                                    required="" class="form-control" id="plan_suite_no" placeholder="Suite No" />
                            </div>
                        </div>
                        <div class="col-md-9 my-3">
                            <div class="form-group">
                                <label for="plan_suite_name">Suite Name</label>
                                <input readOnly value="{{ $floorPlan->plan_suite_name }}" type="text"
                                    required="" class="form-control" id="plan_suite_name"
                                    placeholder="Suite Name" />
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="form-group">
                                <label for="plan_sq_ft">Plan Sq. Ft</label>
                                <input readOnly value="{{ $floorPlan->plan_sq_ft }}" type="number" required=""
                                    class="form-control" id="plan_sq_ft" placeholder="Plan Sq. Ft" />
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="form-group">
                                <label for="plan_bath">Plan Bath</label>
                                <input readOnly value="{{ $floorPlan->plan_bath }}" type="number" required=""
                                    class="form-control" id="plan_bath" placeholder="Plan Bath" />
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="form-group">
                                <label for="plan_bed">Plan Bed</label>
                                <input readOnly value="{{ $floorPlan->plan_bed }}" type="number" required=""
                                    class="form-control" id="plan_bed" placeholder="Plan Bed" />
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="form-group">
                                <label for="plan_availability">Plan Availability</label>
                                <input readOnly value="{{ $floorPlan->plan_availability }}" type="text"
                                    required="" class="form-control" id="plan_availability"
                                    placeholder="Plan Bed" />
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="property_floor_plan" class="d-block">Floor Plan Image</label>
                                <img class="img img-fluid my-2 mx-auto" width="auto" style="max-height: 200px"
                                    src="{{ asset('images/' . $floorPlan->floor_plan_image) }}" />
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="plan_terrace_balcony">Terrace / Balcony</label>
                                <input readOnly value="{{ $floorPlan->plan_terrace_balcony }}" type="text"
                                    required="" class="form-control" id="plan_terrace_balcony"
                                    placeholder="Plan Bed" />
                            </div>
                        </div>
                        <button type="button" style="padding: 7px; width: 130px; margin: 10px auto;"
                            name="btn_remove_property_floor_plan" id="{{ $loop->iteration }}"
                            class="btn btn-xs btn-danger btn_remove_property_floor_plan">
                            <i class="bx bxs-trash"></i>
                        </button>
                        <div class="col-md-12 my-2">
                            <hr />
                        </div>
                    </div>
                @endforeach
            @else
            @endif
        </div>
        <button type="button" name="add_property_floor_plan" style="float: right;padding: 6px 21px;"
            id="add_property_floor_plan" class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
    </div>
    <div class="col-md-12 mb-3 mt-3" style="display: flex; align-items: center; justify-content: center">

        <button type="submit" style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;" class="btn btn-success"
            id="add_property_button">
            @if (isset($property))
                Update
            @else
                Add
            @endif
            {{ $formName }}
        </button>

    </div>
</div>
