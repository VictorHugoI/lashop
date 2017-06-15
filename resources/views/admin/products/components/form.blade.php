<div class="form-horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_name') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_name'),
            ]) }}
            <span class="help-block">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.product_brand') }}
        </label>
        <div class="col-md-8">
            {{ Form::select('brand_id', $brands, null, [
                'id' => 'brand_id',
                'class' => 'form-control',
                'placeholder' => 'Pick a brand...',
            ]) }}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.product_category') }}
        </label>
        <div class="col-md-8">
            {{ Form::select('category_id', $categories, null, [
                'id' => 'category_id',
                'class' => 'form-control',
                'placeholder' => 'Pick a category...',
            ]) }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.url_product') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('url', null, [
                'id' => 'url',
                'class' => 'form-control show-modal',
            ]) }}
            <span class="help-block">{{ $errors->first('url') }}</span>
            <img id="previewImage_url" style="{{ isset($product)?"":"display: none;" }} width: 100px; height: 100px;" src="{{ isset($product)?$product->url:"" }}" />
        </div>
    </div>
    <div class="x_panel x_panel_image">
        <div class="x_title">
            <h2>{{ trans('admin/label.product_images') }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content controls">
        @php
            $i = 0;
        @endphp
        @foreach(isset($pictures) ? $pictures : ['1'] as $picture)
        @php
            $i++;
        @endphp
            <div class="form-group entry">
                <label for="" class="col-md-4 control-label">
                    {{ trans('admin/label.url_product') }}
                </label>
                <div class="col-md-8">
                    <div class="input-group">
                        {{ Form::text('images[]', isset($pictures) ? $picture->url : null, [
                            'id' => 'image_' . $i,
                            'class' => 'form-control show-modal',
                        ]) }}
                        <span class="input-group-btn">
                            <button class="btn 
                            @if(!isset($pictures) || $i == count($pictures)) 
                            btn-success btn-add
                            @else
                             btn-remove btn-danger
                            @endif
                            " type="button">
                                <span class="glyphicon 
                                @if(!isset($pictures) || $i == count($pictures)) 
                                glyphicon-plus
                                @else
                                glyphicon-minus
                                @endif
                                "></span>
                            </button>
                        </span>
                    </div>
                    <img id="previewImage_image_{{ $i }}" style="{{ isset($pictures)?"":"display: none;" }} width: 100px; height: 100px;" src="{{ isset($pictures) ? $picture->url : "" }}" />
                </div>
            </div> 
        @endforeach 
        <input type="hidden" name="count_image" id="count_image" value="{{ $i }}">
        </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.description') }}
        </label>
        <div class="col-md-8">
            {{ Form::textarea('description', null, [
                'id' => 'description',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.description'),
                'rows' => 4,
            ]) }}
            <span class="help-block">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_volume') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('volume', isset($product)?$product->getOriginal()['volume']:null, [
                'id' => 'volume',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_volume'),
            ]) }}
            <span class="help-block">{{ $errors->first('volume') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_price') }}
        </label>
        <div class="col-md-8">
            {{ Form::number('price', isset($product)?$product->getOriginal()['price']:null, [
                'id' => 'price',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_price'),
            ]) }}
            <span class="help-block">{{ $errors->first('price') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('price_sale') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_price_sale') }}
        </label>
        <div class="col-md-8">
            {{ Form::number('price_sale', isset($product)?$product->getOriginal()['price_sale']:null, [
                'id' => 'price_sale',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_price_sale'),
            ]) }}
            <span class="help-block">{{ $errors->first('price_sale') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('sale_detail') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_sale_detail') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('sale_detail', null, [
                'id' => 'sale_detail',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_sale_detail'),
            ]) }}
            <span class="help-block">{{ $errors->first('sale_detail') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('vintage') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_vintage') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('vintage', null, [
                'id' => 'vintage',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_vintage'),
            ]) }}
            <span class="help-block">{{ $errors->first('vintage') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_age') }}
        </label>
        <div class="col-md-8">
            {{ Form::number('age', null, [
                'id' => 'age',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_age'),
            ]) }}
            <span class="help-block">{{ $errors->first('age') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_country') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('country', null, [
                'id' => 'country',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_country'),
            ]) }}
            <span class="help-block">{{ $errors->first('country') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('alcohol') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_alcohol') }}
        </label>
        <div class="col-md-8">
            {{ Form::number('alcohol', null, [
                'id' => 'alcohol',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_alcohol'),
            ]) }}
            <span class="help-block">{{ $errors->first('alcohol') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('material') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.product_material') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('material', null, [
                'id' => 'material',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.product_material'),
            ]) }}
            <span class="help-block">{{ $errors->first('material') }}</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('admin.products.index') }}"
                    title="{{ trans('admin/label.cancel') }}"
                    class="btn btn-default">
                    {{ trans('admin/label.cancel') }}
                </a>
                <button type="submit" class="btn btn-success" title="{{ trans('admin/label.save') }}">
                    {{ trans('admin/label.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

