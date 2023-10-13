@extends('components.admin.layout')
@section('content')
    {{-- View property table --}}

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index" class="nav-link">Home</a>
        </li>
    </ul> --}}
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-caret-square-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-power-off mr-2"></i> LogOut
                </a>

            </div>
        </li>
    </ul>
</nav>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"><br>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" id="update_floor_plan_resvervation">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="m-0">Reserved Floor Plan Detail<span style="font-size: 16px;font-weight: 400;"> -- reservation status -- reservation date; </span></h3>
                                    </div>
                                    <div class="col-md-4">

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input type="text" hidden value="" id="floor_plan_resvervation_id" name="floor_plan_resvervation_id">
                                                    <select name="reservation_status" required id="reservation_status" class="custom-select">
                                                        <option id="">Reservarion Status</option>
                                                        <option value="INITIATED">INITIATED</option>
                                                        <option value="INPROCESS">INPROCESS</option>
                                                        <option value="COMPLETED">COMPLETED</option>
                                                        <option value="CANCELLED">CANCELLED</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="submit" name="update_floor_plan_resvervation_status" class="btn btn-primary" id="update_floor_plan_resvervation_status" value="Update Status">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                            <h5 class="mb-3 mt-4">Property Detail</span></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Property Code</th>
                                            <td>prop_code</td>
                                            <th>Property Name</th>
                                            <td>prop_name</td>
                                            <th>Property City</th>
                                            <td>city_name</td>
                                        </tr>
                                        <tr>
                                            <th>Property Type</th>
                                            <td>prop_type</td>
                                            <th>Property Status</th>
                                            <td>prop_status</td>
                                            <th>Estimate Occupancy Year</th>
                                            <td>est_occupancy_year</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="" style="width: 100%;height: auto;">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-3 mt-4">Floor Plan Detail</span></h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Suite No</th>
                                                    <td>plan_suite_no</td>
                                                </tr>
                                                <tr>
                                                    <th>Suite Name</th>
                                                    <td>plan_suite_name</td>
                                                </tr>
                                                <tr>
                                                    <th>Plan SqFT</th>
                                                    <td>plan_sq_ft</td>
                                                </tr>
                                                <tr>
                                                    <th>Bed</th>
                                                    <td>plan_bed</td>
                                                </tr>
                                                <tr>
                                                    <th>Bath</th>
                                                    <td>plan_bath</td>
                                                </tr>
                                                <tr>
                                                    <th>Terrace/Balcony</th>
                                                    <td>plan_terrace_balcony</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br>
                                    <h5 class="mb-3">Customer Detail</span></h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <td>u_name</td>
                                                </tr>
                                                <tr>
                                                    <th>Customer Address</th>
                                                    <td>u_address</td>
                                                </tr>
                                                <tr>
                                                    <th>Customer Contact No</th>
                                                    <td>u_contact</td>
                                                </tr>
                                                <tr>
                                                    <th>Customer Email</th>
                                                    <td>u_email</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3 mt-4">First Purchaser Details</span></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td>first_name_1</td>
                                            <th>Last Name</th>
                                            <td>last_name_1</td>
                                            <th>Email</th>
                                            <td>email_1</td>
                                        </tr>
                                        <tr>
                                            <th>Phone number</th>
                                            <td>phone_number_1</td>
                                            <th>Street address</th>
                                            <td>street_address_1</td>
                                            <th>City</th>
                                            <td>city_1</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>postal_code_1</td>
                                            <th>Occupation</th>
                                            <td>occupation_1</td>
                                            <th>Uploaded Photo</th>
                                            <td>
                                                <a href="#" target="_blank"><i class="icon-eye-open"></i></a>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mb-3 mt-4">Second Purchaser Details</span></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td>first_name_2</td>
                                            <th>Last Name</th>
                                            <td>'last_name_2'</td>
                                            <th>Email</th>
                                            <td>email_2</td>
                                        </tr>
                                        <tr>
                                            <th>Phone number</th>
                                            <td>phone_number_2</td>
                                            <th>Street address</th>
                                            <td>street_address_2</td>
                                            <th>City</th>
                                            <td>city_2</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>postal_code_2</td>
                                            <th>Occupation</th>
                                            <td>occupation_2</td>
                                            <th>Uploaded Photo</th>
                                            <td>
                                                <a href="#" target="_blank"><i class="icon-eye-open"></i></a>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
