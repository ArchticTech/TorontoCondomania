@extends('components.admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Add Property</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.property.store') }}">
                                    @component('components.admin.propertyForm')

                                        @slot('formName', 'Property')
                                        @slot('architects', $architects)
                                        @slot('cities', $cities)
                                        @slot('developers', $developers)
                                        @slot('developments', $developments)
                                        @slot('interiorDesigners', $interiorDesigners)
                                        @slot('propertyAgents', $propertyAgents)
                                        @slot('propertyTypeEnums', $propertyTypeEnums)
                                        @slot('propertyStatusEnums', $propertyStatusEnums)

                                    @endcomponent
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
