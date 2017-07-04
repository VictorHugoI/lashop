<div id="overlay"></div>
{!! Form::open(['route' => 'property.store', 'class' => 'createForm']) !!}
    <div class="inputCateId" style="display: none">

    </div>
    <div class="col-lg-4 modalCreateProperty" id="modalCreate" style="left: 35%">
        <div class="ibox float-e-margins">
            <div class="ibox-title col-sm-12">
                <h5>Create new attribute</h5>
                <div class="ibox-tools">
                    <a class="closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content col-sm-12">
                <div class="form-horizontal col-sm-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-7">
                            {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) !!}
                            <label style="display: none; color: #a92222; font-style: italic" id="errname"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Label</label>
                        <div class="col-sm-7">
                            {!! Form::text('label', '', ['class' => 'form-control', 'required' => 'required']) !!}
                            <label style="display: none; color: #a92222; font-style: italic" id="errlabel"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Data type</label>
                        <div class="col-sm-7">
                            {!! Form::select('data_type', $dataType, null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Measure unit</label>
                        <div class="col-sm-7">
                            {!! Form::select('measure_unit', $measure, null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content col-sm-12" style="text-align: center">
                <button class="btn btn-primary btnSave" type="button">Save</button>
            </div>
        </div>
    </div>
{!! Form::close() !!}
