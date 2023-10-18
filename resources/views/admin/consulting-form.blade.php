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
                                        <tr >
                                            <th style="color: #000">ID</th>
                                            <th style="color: #000">Full Name</th>
                                            <th style="color: #000">Phone Number</th>
                                            <th style="color: #000">Email Address</th>
                                            <th style="color: #000">Response</th>
                                            <th style="color: #000">Broker</th>
                                            <th style="color: #000">Looking for Purchase</th>
                                            <th style="color: #000">Message</th>
                                            <th style="color: #000">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($consultations as $consultation)
                                            <tr>
                                                <td>{{ $consultation->id }}</td>
                                                <td>{{ $consultation->full_name }}</td>
                                                <td>{{ $consultation->phone_no }}</td>
                                                <td>{{ $consultation->email_address }}</td>
                                                <td>{{ $consultation->call_response }}</td>
                                                <td>{{ $consultation->isBroker }}</td>
                                                <td>{{ $consultation->looking_for_purchase }}</td>
                                                <td>{{ $consultation->message_consultation }}</td>
                                                <td>{{ $consultation->created_at }}</td>
                                            </tr>
                                            @endforeach --}}
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
