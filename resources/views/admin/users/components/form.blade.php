<div class="form-horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('admin/label.user_name') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.user_name'),
            ]) }}
            <span class="help-block">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.email') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('email', null, [
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.email'),
            ]) }}
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>
    </div>
    @if(!isset($user))
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.password') }}
        </label>
        <div class="col-md-8">
            {{ Form::password('password', [
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.password'),
            ]) }}
        <span class="help-block">{{ $errors->first('password') }}</span>
        </div>
    </div>
    @endif
    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
        <label for="" class="col-md-4 control-label">
            {{ trans('admin/label.role') }}
        </label>
        <div class="col-md-8">
            {{ Form::select('role', config('setup.user_types'), null, [
                'id' => 'role',
                'class' => 'form-control',
                'placeholder' => trans('admin/label.placeholder_role'),
            ]) }}
            <span class="help-block">{{ $errors->first('role') }}</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('admin.users.index') }}"
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

