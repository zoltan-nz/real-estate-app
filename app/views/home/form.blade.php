<div class="well">
    {{Form::open(array('url'=>'', 'class'=>'form-horizontal', 'id'=>'form-search')) }}
    <div class="form-group">
        {{Form::label('county', 'County:', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            {{Form::select('county', $counties_options, '', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('city', 'City:', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            {{Form::select('city', ['Select County First'], '', array('id' => 'city', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('price_from', 'Price From:', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            <input type="number" name='price_from' id="price_from" class="form-control">
        </div>
    </div>
    <div class="form-group">
        {{Form::label('price_to', 'Price To:', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            <input type="number" name='price_to' id="price_to" class="form-control">
        </div>
    </div>
    <div class="form-group">
        {{Form::label('house_type_id', 'House Type:', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            {{Form::select('house_type_id', $house_type_options, '', array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            {{ Form::submit('Search', array('class'=>'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}

</div>
