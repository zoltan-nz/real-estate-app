@if ( $errors->count() > 0 )
<div class="alert alert-danger">
<p>The following errors have occurred:</p>

<ul>
    @foreach( $errors->all() as $message )
    <li>{{ $message }}</li>
    @endforeach
</ul>
</div>
@endif

@if ($action == 'edit')
    {{ Form::model($property, array('route' => array('admin.properties.update', $property->id), 'class' => 'form-horizontal', 'method' => 'patch', 'files' => true)) }}
@elseif ($action == 'create')
    {{ Form::model($property, array('route' => array('admin.properties.store'), 'class' => 'form-horizontal', 'method' => 'post', 'files' => 'true')) }}
@endif

<div class="form-group">
    {{Form::label('title', 'Title: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::text('title', $property->title, array('class' => 'form-control', 'required' => 'true')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('details', 'Details:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::text('details', $property->details, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('price', 'Price: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        <input type='number' name='price' id='price' required='true' class='form-control' value='{{{ $property->price }}}'>
    </div>
</div>
<div class="form-group">
    {{Form::label('sales_type_id', 'Sales Type: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::select('sales_type_id', $sales_type_options, $property->sales_type_id, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('county_id', 'County: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::select('county_id', $county_options, $property->county_id, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('city_id', 'City: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4" id="admin_form_city_list">
        {{Form::select('city_id', $city_options, $property->city_id, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('house_type_id', 'House Type: *', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::select('house_type_id', $house_type_options, $property->house_type_id, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('address_1', 'Address 1:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::text('address_1', $property->address_1, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('address_2', 'Address 2:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::text('address_2', $property->address_2, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('address_3', 'Address 3:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{Form::text('address_3', $property->address_3, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{Form::label('number_of_beds', 'Number of Beds:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        <input name='number_of_beds' id='number_of_beds' value='{{{$property->number_of_beds}}}' type='number' class='form-control'>        
    </div>
</div>
<div class="form-group">
    {{Form::label('number_of_baths', 'Number of Baths:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        <input name='number_of_baths' id='number_of_baths' value='{{{$property->number_of_baths}}}' type='number' class='form-control'>                
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{Form::hidden('pet_allowed', 0); }}
        {{Form::checkbox('pet_allowed', 1, $property->pet_allowed, array('class' => '')) }}
        Pet allowed
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{Form::hidden('dishwasher', 0); }}
        {{Form::checkbox('dishwasher', 1, $property->dishwasher, array('class' => '')) }}
        Dishwasher
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{Form::hidden('furnished', 0); }}
        {{Form::checkbox('furnished', 1, $property->furnished, array('class' => '')) }}
        Furnished
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{Form::hidden('sold', 0); }}
        {{Form::checkbox('sold', 1, $property->sold, array('class' => '')) }}
        Sold
    </div>
</div>



<div class="form-group">
    {{Form::label('picture', 'Picture:', array('class'=>'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        File name format must be: 'name.jpg' (Uppercase and spaces not allowed. Only jpg.)
        Max size: 1 MB
        {{Form::file('picture') }}
        @if (isset($property->picture))
            <img src="<?= $property->picture ?>" >
            {{Form::checkbox('delete_picture', 1, '')}}
            Delete image
        @endif
    </div>
</div>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}