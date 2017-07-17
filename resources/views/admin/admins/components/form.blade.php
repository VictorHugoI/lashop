<div class="form-horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            User name
        </label>
        <div class="col-md-8">
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'User name',
            ]) }}
            <span class="help-block">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            Email
        </label>
        <div class="col-md-8">
            {{ Form::text('email', null, [
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'email',
            ]) }}
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>
    </div>
    @if(!isset($admin))
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            Password
        </label>
        <div class="col-md-8">
            {{ Form::password('password', [
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' =>  'password',
            ]) }}
        <span class="help-block">{{ $errors->first('password') }}</span>
        </div>
    </div>
    @endif
    <div class="form-group">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('admins.index') }}"
                    title="{{ trans('admin/label.cancel') }}"
                    class="btn btn-default">
                    Cancel
                </a>
                <button type="submit" class="btn btn-success" title="{{ trans('admin/label.save') }}">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

