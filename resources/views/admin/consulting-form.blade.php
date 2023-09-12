@extends('components.admin.layout')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Consulting Forms</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card">
                            <div class="card-body">
                                <table id="tables"
                                    class="table table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Response</th>
                                            <th>Looking for Purchase</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td colspan="8" class="text-center">No data to display</td>
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
