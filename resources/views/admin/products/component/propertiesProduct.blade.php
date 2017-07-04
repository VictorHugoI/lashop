@foreach($properties as $property)
    <div class="form-group">
    <label class="col-sm-3 control-label">{{ $property->label }}:</label>

    <div class="col-sm-9 selectBottomCategories">
        {!! Form::text($property->name, '',['class' => 'form-control property', 'id' => $property->id]) !!}
    </div>
    </div>
@endforeach
