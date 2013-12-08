<h4>Search Result</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Picture</th>
            <th>County</th>
            <th>City</th>
            <th>Price</th>
            <th>House Type</th>
        </tr>
    </thead>


    @if (sizeof($properties) < 1)
        <tr>
            <td colspan="6">
                No results for this search.
            </td>
        </tr>
    @endif

    @foreach ($properties as $property)
    <tr>
        <td>

            {{ $property->title }}
        </td>
        <td>
            @if (isset($property->picture))
            <img src="{{ $property->picture }}" >
            @endif
        </td>
        <td>
            @if (isset($property->county->name))
                {{ $property->county->name }}</td>
            @endif
        <td>
            @if (isset($property->city->name))
                {{ $property->city->name }}
            @endif
        </td>
        <td>
            {{ $property->price }}
        </td>
        <td>
            @if (isset($property->house_type->name))
                {{ $property->house_type->name }}
            @endif
        </td>

    </tr>
    @endforeach
</table>
