@extends('customers.layout.master')

@section('content')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <fieldset class="col2-set">
                    {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                    <div class="col-1 col-md-offset-3 registered-users"><strong>{{ trans('user/label.register_customer') }}</strong>
                        <div class="content">
                            <p>{{ trans('user/label.has_account') }}</p>
                            <ul class="form-list">
                                <li>
                                    <label for="email">Name <span class="required">*</span></label>
                                    <br>
                                    <input type="text" class="input-text required-entry" id="name" value="{{ old('name') }}" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </li>
                                <li>
                                    <label for="email">Email<span class="required">*</span></label>
                                    <br>
                                    <input type="text" class="input-text required-entry" id="email" value="{{ old('email') }}" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label for="pass">Password <span class="required">*</span></label>
                                    <br>
                                    <input type="password" id="password" class="input-text required-entry validate-password" name="password"required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label for="pass">{{ trans('user/label.confirm_password') }} <span class="required">*</span></label>
                                    <br>
                                    <input type="password" id="password-confirm" class="input-text required-entry validate-password" name="password_confirmation" required>
                                </li>
                            </ul>
                            <p class="required">* {{ trans('user/label.require_field') }}</p>
                            <div class="buttons-set">
                                <button id="send2" name="send" type="submit" class="button login"><span>{{ trans('user/label.register') }}</span></button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </fieldset>
            </div>
            <br>

        </div>

    </section>
@endsection