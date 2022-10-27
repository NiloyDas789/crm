<div class="row mb-2">
    <div class="col-6">
        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} mb-3">
            {{ Form::label('image', 'Image', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-9">
                {{ Form::file('image', ['class' => 'filestyle','id'=>'imageUpload']) }}
                {{-- <p class="help-block">Help block text</p> --}}
                <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div id="preview-wrap">
            <img src="{{ $contact->image ?? null }}" class="rounded" width="100px" id="imagePP">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('name', 'First Name', ['class' => 'col-sm-6 control-label','for'=>'name']) }}
            <div class="col-sm-9">
                {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
        </div>
    </div>


</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }} mb-3">
            {{ Form::label('dob', 'Date of Birth', ['class' => 'col-sm-6 control-label','for'=>'dob']) }}
            <div class="col-sm-9">
                {{ Form::date('dob', null, ['class' => 'form-control','placeholder' => 'Enter dob','id'=>'dob', 'required']) }}
                <small class="text-danger">{{ $errors->first('dob') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
            {{ Form::label('email', 'Email', ['class' => 'col-sm-6 control-label','for'=>'email']) }}
            <div class="col-sm-9">
                {{ Form::text('email', null, ['class' => 'form-control','placeholder' => 'Enter email','id'=>'email', 'required']) }}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} mb-3">
            {{ Form::label('phone', 'Phone', ['class' => 'col-sm-6 control-label','for'=>'phone']) }}
            <div class="col-sm-9">
                {{ Form::text('phone', null, ['class' => 'form-control','placeholder' => 'Enter phone','id'=>'phone', 'required']) }}
                <small class="text-danger">{{ $errors->first('phone') }}</small>
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
                {{ Form::select('state_id', $states, $contact->city->state ?? null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'state_id', 'required' => 'required']) }}
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




