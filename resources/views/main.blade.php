<div>
    @foreach ($properties as $property)
        <p>{{ $property->prop_name }}</p>
        <!-- Display other property attributes as needed -->
    @endforeach
</div>