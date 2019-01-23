@extends('layouts.default')

@section('content')
<!--Banner-->
<div class="register-main">
    <div class="container">
        {!! Form::open(['url' => 'patient/register', 'id' => 'formRegister', 'method' => 'post']) !!}
        <div class="register-form-main">
            <h3><i class="fa fa-user" aria-hidden="true"></i>New Patient</h3>
            @include('includes.alerts')
            @if($uuid)
            {!!  Form::hidden('uuid', $uuid); !!}
            @endif
            {!! Form::text('first_name', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'First Name']) !!}
            {!! Form::text('last_name', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Last Name']) !!}
            {!! Form::text('email', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Email Address']) !!}
            {!! Form::password('password', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password', 'maxlength'=>20]) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password Confirmation', 'maxlength'=>20]) !!}
            <p class="gender">Gender</p>
            <div class="radio radio-info radio-inline">
                {!! Form::radio('gender', 'M', false, ['id' => 'inlineRadio1']) !!}
                <label for="inlineRadio1"> Male </label>
            </div>
            <div class="radio radio-inline">
                {!! Form::radio('gender', 'F', false, ['id' => 'inlineRadio2']) !!}
                <label for="inlineRadio2"> Female </label>
            </div>
            <div class="input-group datepicker-control mrgn-btm-25 form_date date" data-date="" data-date-format="mm/dd/yyyy">
                {!! Form::text('dob', '', ['class' => 'date-picker form-control', 'readonly' => 'true','placeholder' => 'Date of Birth', 'onclick' => 'this.blur();']) !!}
                <span class="input-group-addon calendar-icn-bg"><i class="fa fa-calendar icon-calendar"></i></span>
            </div>          
            <!-- {!! Form::text('country_code', '', ['class' => 'form-control','placeholder' => 'Country Code', 'maxlength'=>5]) !!}
            {!! Form::text('contact_number', '', ['class' => 'form-control','placeholder' => 'Phone Number', 'maxlength'=>15]) !!} -->
            <div class="row mrgn-btm-25">
               <div class="col-md-3 country-code input-group">
                  <span class="input-group-addon">+</span>
                  {!! Form::text('country_code', '1', ['class' => 'form-control','placeholder' => 'Code', 'maxlength'=>5]) !!}
               </div>
                <div class="col-md-9">
                   {!! Form::text('contact_number', '', ['class' => 'form-control','placeholder' => 'Phone Number', 'maxlength'=>15]) !!}
               </div>
         </div>

            <!-- <div class="num_format mrgn-btm-25">{{ trans('custom.phone_num_format_text') }}</div> -->
            {!! Form::submit('Complete Registration', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!--Banner End-->
@endsection