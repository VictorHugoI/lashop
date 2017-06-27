<div id="overlay"></div>
{!! Form::open(['route' => 'property.store', 'class' => 'createForm']) !!}
    <div class="inputCateId" style="display: none">

    </div>
    <div class="col-lg-4 modalCreateProperty" id="modalCreate">
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
                <div class="form-horizontal col-sm-10 col-sm-offset-1">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="col-sm-10 col-sm-offset-2" id="errname">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Label</label>
                        <div class="col-sm-10">
                            {!! Form::text('label', '', ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="col-sm-10 col-sm-offset-2" id="errlabel">

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
