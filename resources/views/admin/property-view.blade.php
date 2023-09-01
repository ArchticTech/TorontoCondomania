@extends('components.admin.layout')
@section('content')


                {{-- View property table --}}



                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1 class="m-0">View Property</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><br>
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tables"
                                                class="table table-bordered table-sm table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Property Code</th>
                                                        <th>Property Name</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Price From</th>
                                                        <th>Price To</th>
                                                        <th>Est. Occpancy</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>







@endsection
