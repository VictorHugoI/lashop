@extends('user.layouts.applayout')
@push('scripts')
    {!! Html::script('js/user/inputmask.js') !!}
    {!! Html::script('js/user/parsley.min.js') !!}
@endpush
@section('content')
    <div class="main-container col2-right-layout">
        {!! Form::open(['action' => ['User\ProfileController@update', auth::id()], 'class' => 'formProfile', 'files' => 'true', 'method' => 'PUT']) !!}
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9 wow">
                <div class="page-title">
                    <h2>Contact Us</h2>
                </div>
                <div class="static-contain">
                    <fieldset class="group-select">
                        <ul>
                            <li id="billing-new-address-form">
                                <fieldset>
                                    <legend>New Address</legend>
                                    <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
                                    <ul>
                                        <li>
                                            <div class="customer-name">
                                                <div class="input-box name-firstname">
                                                    <label for="billing:firstname"> Full Name<span class="required">*</span></label>
                                                    <br>
                                                    {!! Form::text('name', $user->name, ['class' => 'input-text', 'required' => 'required'])!!}
                                                </div>
                                                <div class="input-box name-lastname">
                                                    <label for="billing:lastname"> Email Address <span class="required">*</span> </label>
                                                    <br>
                                                    {!! Form::email('email', $user->email, ['class' => 'input-text'])!!}
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-box">
                                                <label for="billing:company">Birth day</label>
                                                <br>
                                                {!! Form::text('birth', $user->birth, ['class' => 'input-text birth', 'placeholder' => '__/__/____', 'max' => '10'])!!}
                                            </div>
                                            <div class="input-box">
                                                <label for="billing:email">Telephone <span class="required">*</span></label>
                                                <br>
                                                {!! Form::text('phone', $user->phone, ['class' => 'input-text', 'placeholder' => '094-2982-095', 'max' => '10'])!!}
                                            </div>
                                        </li>
                                        <li>
                                            <label for="billing:street1">Address <span class="required">*</span></label>
                                            <br>
                                                {!! Form::text('address', $user->address, ['class' => 'input-text birth'])!!}
                                        </li>
                                        <li class="">
                                            <label for="comment">Comment<em class="required">*</em></label>
                                            <br>
                                            <div style="float:none" class="">
                                                {!! Form::textarea('description', $user->description, ['class' => 'required-entry input-text', 'cols' => '5', 'rows' => '3'])!!}
                                            </div>
                                        </li>
                                    </ul>
                                </fieldset>
                            </li>
                            <p class="require"><em class="required">* </em>Required Fields</p>
                            <input type="text" name="hideit" id="hideit" value="" style="display:none !important;">
                            <div class="buttons-set">
                                <button type="submit" title="Submit" class="button submit" id="updateProfile"> <span> Submit </span> </button>
                            </div>
                        </ul>
                    </fieldset>
                </div>
            </section>
            <aside class="col-right sidebar col-sm-3 wow">
                <div class="block block-company">
                    <div class="block-title">Your Image </div>
                    <div class="block-content">
                        <img src="{{ asset($user->url) }}" style="width: 100%" id="imageUser">
                    </div>
                </div>

                <div class="upload-btn-wrapper" style="width: 100%">
                    <button class="btn" style="width: 100%">Upload a file</button>
                    <input type="file" name="myfile" onchange="document.getElementById('imageUser').src = window.URL.createObjectURL(this.files[0])"/>
                </div>
            </aside>
        </div>
    </div>
        {!! Form::close() !!}
</div>
@endsection
