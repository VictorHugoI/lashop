@extends('admin.layout.master')
@push('styles')
{{ Html::style('assets/admin/css/plugins/jasny/jasny-bootstrap.min.css') }}
{{ Html::script('assets/admin/sweetalert/dist/sweetalert.min.js') }}
{{ Html::style('assets/admin/sweetalert/dist/sweetalert.css') }}

@endpush
@push('scripts')
{{ Html::script('assets/admin/js/plugins/jasny/jasny-bootstrap.min.js') }}
{{ Html::script('assets/admin/js/plugins/validate/jquery.validate.min.js') }}
<script src="http://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

<script>
    $('.firstCategories').on('change', function (e) {
        var btn = $(e.currentTarget);

        $.get('getBottomProperty/' + btn.val(), function (data) {
            $('.selectBottomCategories').html(data.select);
        })
    });
    CKEDITOR.replace('description');
    $('.createProductForm').validate({
        rules: {
            price: {
                required: true,
                number: true
            },
        },
    });
</script>
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class=""><a data-toggle="tab" href="#tab-1">Stage 1: Enter info for product.</a></li>
                        <li class="active"><a data-toggle="tab" href="#tab-2">Stage 2: Enter properties for product.</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane">
                            <div class="panel-body">
                                {{--{!! Form::open([
                                    'route' => 'product.store', 'class' => 'createProductForm',
                                    'files' => 'true', 'id' => 'createProductForm'
                                    ])
                                !!}--}}
                                <fieldset class="col-lg-5" style="text-align: center">
                                    <img src="{{ 'http://lashop.dev/stograge/app/assets/images/product-images/' . $product->image }}"
                                         class="imageProduct" id="imageProduct">

                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput"
                                         style="margin-top: 10px">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"
                                                   onchange="document.getElementById('imageProduct').src = window.URL.createObjectURL(this.files[0])"/>
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">Remove</a>
                                    </div>
                                </fieldset>
                                <fieldset class="form-horizontal col-lg-7">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name:</label>

                                        <div class="col-sm-9">
                                            {!! Form::text('name', $product->name, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Product name',
                                                'required',
                                                'id' => 'nameProduct'
                                                ])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Price:</label>

                                        <div class="col-sm-9">
                                            {!! Form::text('price', $product->price,[
                                                'class' => 'form-control',
                                                ])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Brand:</label>

                                        <div class="col-sm-9">
                                            {!! Form::select('brand_id', $brands, $product->brand_id,
                                            ['class' => 'form-control brands', 'id' => 'brands']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">First category:</label>

                                        <div class="col-sm-9">
                                            {!! Form::select('firstCategories', $firstCategories, $firstcategory->id,
                                            ['class' => 'form-control firstCategories', 'id' => 'firstCategories']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bottom category:</label>

                                        <div class="col-sm-9 selectBottomCategories">
                                            {!! Form::select('category_id', $bottomCategories, $product->category_id,
                                            ['class' => 'form-control categories', 'id' => 'categories']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description:</label>

                                        <div class="col-sm-9">
                                            <textarea id="description" name="description">
                                                {!! $product->description !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-primary btnSaveProduct" style="float: right; margin-right: 15px">
                                    Update this product
                                </button>
                                {{--{!! Form::close() !!}--}}
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane active">
                            <div class="panel-body">
                                <fieldset class="form-horizontal">
                                    {!! Form::open(['route' => 'product.saveProperties']) !!}
                                    {!! Form::hidden('category_id', $product->category_id) !!}
                                    {!! Form::hidden('product_id', $product->id) !!}
                                    @foreach($properties as $property)
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ $property->label }}:</label>
                                            <div class="col-sm-7 selectBottomCategories">
                                                @if($property->data_type ==1)
                                                    {!! Form::number($property->name, '',[
                                                        'class' => 'form-control property',
                                                        'id' => $property->id,
                                                    ]) !!}
                                                @else
                                                    {!! Form::text($property->name, '',[
                                                        'class' => 'form-control property',
                                                        'id' => $property->id,
                                                    ]) !!}
                                                @endif
                                            </div>
                                            <label class="col-sm-2" style="padding-top: 7px"> /
                                                {{ (\App\Models\CategoryProperty::where('property_id', $property->id)
                                                    ->where('category_id', $product->category_id)->first())->unit }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="hr-line-dashed"></div>
                                    <button class="btn btn-primary btnSaveProduct" style="float: right; margin-right: 310px">
                                        Add property
                                    </button>
                                    {!! Form::close() !!}
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
