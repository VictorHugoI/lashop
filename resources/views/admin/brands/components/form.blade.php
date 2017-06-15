<div class="form-horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.brand_name') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.brand_name'),
            ]) }}
            <span class="help-block">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.founded_year_brand') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('founded_year', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.brand_name'),
            ]) }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.url_brand') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('url', null, [
                'id' => 'url',
                'class' => 'form-control show-modal',
            ]) }}
            <span class="help-block">{{ $errors->first('url') }}</span>
            <img id="previewImage_url" style="width: 100px; height: 100px;" src="{{ isset($brand)?$brand->url:"" }}" />
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
    <div class="form-group">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('admin.brands.index') }}"
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

