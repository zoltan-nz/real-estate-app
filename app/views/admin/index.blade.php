@extends('layouts.admin')
@section('content')

<div class="pull-left">
    <h3>All property</h3>
</div>
<div class="pull-right">
    {{ link_to_route("admin.properties.create", 'Create a New Property', array(), array('class' => 'btn btn-success')) }}
</div>


<table class="table table-striped table-bordered" id="property-index">
    <thead>
    <tr>
        <th>ID</th>
        <th>Sold?</th>
        <th>Title</th>
        <th>Picture</th>
        <th>Details</th>
        <th>Price</th>
        <th>County</th>
        <th>City</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>


    @foreach ($properties as $property)

    <tr>
        <td>{{ $property->id }}</td>
        <td>
            @if ($property->sold == '1')
                SOLD!
            @endif
        </td>
        <td>{{ $property->title }}</td>
        <td>
            @if (isset($property->picture))
            <img src="<?= $property->picture ?>" >
            @endif
        </td>
        <td>{{ $property->details }}</td>
        <td>{{ $property->price }}</td>
        <td>
            @if (isset($property->county->name))
                {{ $property->county->name }}</td>
            @endif
        <td>
            @if (isset($property->city->name))
                {{ $property->city->name }}
            @endif
        </td>

        <td>{{ $property->created_at }}</td>
        <td>{{ $property->updated_at }}</td>
        <td>
            {{ link_to("admin/properties/$property->id/edit", 'Edit', array('class' => 'btn btn-primary')) }}
            {{ link_to_action('PropertyAdminController@destroy', 'X', $property->id, array('class' => 'btn btn-danger js-delete')) }}

        </td>
    </tr>
    @endforeach
    </tbody>

</table>


@stop