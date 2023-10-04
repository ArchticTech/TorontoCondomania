@extends('components.admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Update Rental</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.rentals.update', ['id' => $rental->id]) }}" />
                                    @method('put')
                                    @component('components.admin.rentalForm')

                                        @slot('cities', $cities)
                                        @slot('rental', $rental)
                                        @slot('propertyTypeEnums', $propertyTypeEnums)
                                        @slot('rentalImages', $rentalImages)
                                        @slot('rentalFeatures', $rentalFeatures)

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
