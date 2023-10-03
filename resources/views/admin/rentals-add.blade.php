@extends('components.admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Add Rental</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.rentals.store') }}">
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="rent_name">Rent Name</label>
                                                <input type="text" required class="form-control" id="rent_name"
                                                    name="name" placeholder="Rent Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="rent_address">Rent Address</label>
                                                <input type="text" required class="form-control" id="rent_address"
                                                    name="rent_address" placeholder="Rent Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="rent_iframe">Rent iFrame</label>
                                                <input type="text" required class="form-control" id="rent_iframe"
                                                    name="rent_iframe" placeholder="Assignment Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="rent_type">Rent Type</label>
                                                <input type="text" required class="form-control" id="rent_type"
                                                    name="rent_type" placeholder="Rent Type">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="rent_beds">No Of Beds</label>
                                                <input type="number" value="0" required class="form-control"
                                                    id="rent_beds" name="rent_beds" placeholder="No Of Beds">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="rent_baths">No Of Baths</label>
                                                <input type="number" value="0" required class="form-control"
                                                    id="rent_baths" name="rent_baths" placeholder="No Of Baths">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="rent_sqft">Rent per Sq/ft</label>
                                                <input type="text" class="form-control" id="rent_sqft" required
                                                    name="rent_sqft" placeholder="Rent per Sq/ft">
                                            </div>
                                        </div>


                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="available_date">Available Date</span></label>
                                                <input class="form-control" required id="available_date"
                                                    name="available_date" type="date" placeholder="Available Date">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="monthly_rent">Monthly Rent</label>
                                                <input type="number" class="form-control" id="monthly_rent" required
                                                    value="0" name="monthly_rent" placeholder="Monthly Rent">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="security_deposit">Security Deposit</label>
                                                <input type="number" class="form-control" id="security_deposit" required
                                                    value="0" name="security_deposit" placeholder="Security Deposit">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="laundry_located">Laundry Located</label>
                                                <input type="text" required class="form-control" id="laundry_located"
                                                    name="laundry_located" placeholder="Laundry Located">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="rent_description">Rent Description</label>
                                                <input type="text" required class="form-control" id="rent_description"
                                                    name="rent_description" placeholder="Rent Description">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="pet_policy">Pet Policy</label>
                                                <input type="text" required class="form-control" id="pet_policy"
                                                    name="pet_policy" placeholder="Rent Description">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="smoking_policy">Smoking Policy</label>
                                                <input type="text" required class="form-control" id="smoking_policy"
                                                    name="smoking_policy" placeholder="Smoking Policy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="lease_length">Lease Length</label>
                                                <input type="text" required class="form-control" id="lease_length"
                                                    name="lease_length" placeholder="Smoking Policy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="lease_terms">Lease Terms</label>
                                                <input type="text" required class="form-control" id="lease_terms"
                                                    name="lease_terms" placeholder="Smoking Policy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="rental_status">Rental Status</label>
                                                <input type="text" required class="form-control" id="rental_status"
                                                    name="rental_status" placeholder="Smoking Policy">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 mt-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rent
                                                Features</p>
                                            <table class="table table-bordered table-hover" id="rent_feature_table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Rent Feature</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="property_feature_tbody">

                                                </tbody>
                                            </table>
                                            <button type="button" name="add_rent_feature"
                                                style="float: right;padding: 6px 21px;" id="add_rent_feature"
                                                class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
                                        </div>

                                        <div class="col-md-12 mt-3 mb-3">
                                            <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rent Images
                                            </p>
                                            <div class="row" id="rental_image_row">
                                            </div>
                                            <button type="button" name="add_rental_image"
                                                style="float: right;padding: 6px 21px;" id="add_rental_image"
                                                class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
                                        </div>

                                        <div class="col-md-12 mb-3 mt-3"
                                            style="display: flex; align-items: center; justify-content: center">

                                            <button type="submit"
                                                style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                                class="btn btn-success" id="add_property_button">Add
                                                Rentals</button>

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
