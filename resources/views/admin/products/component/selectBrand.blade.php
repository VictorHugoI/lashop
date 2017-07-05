<div class="form-group">
    <label class="control-label" for="price">Brand</label>
    {!! Form::select('brand_id', ['0' => ' All brands... '] + $brands, null,
        ['class' => 'form-control selectBrand', 'id' => 'brands']) !!}
</div>
