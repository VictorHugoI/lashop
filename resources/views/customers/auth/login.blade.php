@extends('customers.layout.master')
@section('content')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>Login or Create an Account</h2>
                </div>
                <fieldset class="col2-set">
                    <legend>{{ trans('user/label.title_login') }}</legend>
                    <div class="col-1 new-users"><strong>New Customers</strong>
                        <div class="content">
                            <p>{{ trans('user/label.content_login') }}</p>
                            <div class="buttons-set">
                                <button onclick="window.location='{{ route('register') }}';" class="button create-account" type="button"><span>Create new account</span></button>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                        <div class="col-2 registered-users"><strong>Registered Customers</strong>
                            <div class="content">
                                <p>If you have an account with us, please log in.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email">Email<span class="required">*</span></label>
                                        <br>
                                        <input type="text" title="Email Address" class="input-text required-entry" id="email" value="{{ old('email') }}" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </li>
                                    <li>
                                        <label for="pass">Password<span class="required">*</span></label>
                                        <br>
                                        <input type="password" title="Password" id="password" class="input-text required-entry validate-password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </li>
                                </ul>
                                <p class="required">* Required Fields</p>
                                <div class="buttons-set">
                                    <button id="send2" name="send" type="submit" class="button login"><span>Login</span></button>
                                    <a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a> </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </fieldset>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </section>
@endsection