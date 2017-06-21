<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close"
                data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"
            id="favoritesModalLabel">Info of property</h4>
    </div>
    {!! Form::open(['action' => ['Admin\PropertiesController@update', $property->id], 'method' => 'PUT', 'class' => 'updateProper']) !!}
        <div class="modal-body" style="text-align: center">
            <div class="form-horizontal">
                <div class="form-group" style="text-align: center">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-6">
                        {!! Form::text('name', $property->name, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <label class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-6">
                        {!! Form::text('label', $property->label, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnSua" style="margin-right: 10px" data-dismiss="modal">
                Update
            </button>

            <span class="pull-right">
            <button type="button"
                        class="btn btn-warning"
                        data-dismiss="modal">Close
            </button>
            </span>
        </div>
    {!! Form::close() !!}
</div>
