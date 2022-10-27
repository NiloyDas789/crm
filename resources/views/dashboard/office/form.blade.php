<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-6 control-label','for'=>'name']) }}
            <div class="col-sm-9">
                {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }} mb-3">
            {{ Form::label('contact_person', 'Contact Person', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('contact_person', $contactPersons, null, ['class' => 'form-control select2','style'=>'width: 100%',  'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('contact_person') }}</small>

            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} mb-3">
            {{ Form::label('mobile', 'Mobile', ['class' => 'col-sm-6 control-label','for'=>'mobile']) }}
            <div class="col-sm-9">
                {{ Form::text('mobile', null, ['class' => 'form-control','placeholder' => 'Enter mobile','id'=>'mobile', 'required']) }}
                <small class="text-danger">{{ $errors->first('mobile') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} mb-3">
            {{ Form::label('phone', 'Phone', ['class' => 'col-sm-6 control-label','for'=>'phone']) }}
            <div class="col-sm-9">
                {{ Form::text('phone', null, ['class' => 'form-control','placeholder' => 'Enter phone','id'=>'phone', 'required']) }}
                <small class="text-danger">{{ $errors->first('phone') }}</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
            {{ Form::label('email', 'Email', ['class' => 'col-sm-6 control-label','for'=>'email']) }}
            <div class="col-sm-9">
                {{ Form::text('email', null, ['class' => 'form-control','placeholder' => 'Enter email','id'=>'email', 'required']) }}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} mb-3">
            {{ Form::label('zip_code', 'Zip Code', ['class' => 'col-sm-6 control-label','for'=>'zip_code']) }}
            <div class="col-sm-9">
                {{ Form::text('zip_code', null, ['class' => 'form-control','placeholder' => 'Enter zip_code','id'=>'zip_code', 'required']) }}
                <small class="text-danger">{{ $errors->first('zip_code') }}</small>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('country_id', 'Country', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('country_id', $countries, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('country_id') }}</small>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('state_id', 'State', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('state_id', [], null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'state_id', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('state_id') }}</small>

            </div>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-6">
        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('city_id', 'City', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('city_id', [], null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'id'=>'city_id',  'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('city_id') }}</small>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} mb-3">
            {{ Form::label('street', 'Street', ['class' => 'col-sm-6 control-label','for'=>'street']) }}
            <div class="col-sm-9">
                {{ Form::text('street', null, ['class' => 'form-control','placeholder' => 'Enter street','id'=>'street', 'required']) }}
                <small class="text-danger">{{ $errors->first('street') }}</small>
            </div>
        </div>
    </div>

</div>
