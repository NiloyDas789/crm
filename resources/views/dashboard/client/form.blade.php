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
            <img src="{{ $client->image ?? null }}" class="rounded" width="100px" id="imagePP">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('first_name', 'First Name', ['class' => 'col-sm-6 control-label','for'=>'first_name']) }}
            <div class="col-sm-9">
                {{ Form::text('first_name', null, ['class' => 'form-control','placeholder' => 'Enter first_name','id'=>'first_name', 'required']) }}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('last_name', 'Last Name', ['class' => 'col-sm-6 control-label','for'=>'last_name']) }}
            <div class="col-sm-9">
                {{ Form::text('last_name', null, ['class' => 'form-control','placeholder' => 'Enter last_name','id'=>'last_name', 'required']) }}
                <small class="text-danger">{{ $errors->first('last_name') }}</small>
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
        <div class="form-group{{ $errors->has('contact_reference') ? ' has-error' : '' }} mb-3">
            {{ Form::label('contact_reference', 'Contact Refference', ['class' => 'col-sm-6 control-label','for'=>'contact_reference']) }}
            <div class="col-sm-9">
                {{ Form::text('contact_reference', null, ['class' => 'form-control','placeholder' => 'Enter contact_reference','id'=>'contact_reference']) }}
                <small class="text-danger">{{ $errors->first('contact_reference') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('country_id', 'Country', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('country_id', $countries, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()']) }}
                <small class="text-danger">{{ $errors->first('country_id') }}</small>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('state_id', 'State', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('state_id', [], null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'state_id']) }}
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
                {{ Form::text('street', null, ['class' => 'form-control','placeholder' => 'Enter street','id'=>'street']) }}
                <small class="text-danger">{{ $errors->first('street') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} mb-3">
            {{ Form::label('zip_code', 'Zip Code', ['class' => 'col-sm-6 control-label','for'=>'zip_code']) }}
            <div class="col-sm-9">
                {{ Form::text('zip_code', null, ['class' => 'form-control','placeholder' => 'Enter zip_code','id'=>'zip_code']) }}
                <small class="text-danger">{{ $errors->first('zip_code') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('visa_expiry_date') ? ' has-error' : '' }} mb-3">
            {{ Form::label('visa_expiry_date', 'Visa Expiry Date', ['class' => 'col-sm-6 control-label','for'=>'visa_expiry_date']) }}
            <div class="col-sm-9">
                {{ Form::date('visa_expiry_date', null, ['class' => 'form-control','placeholder' => 'Enter visa_expiry_date','id'=>'visa_expiry_date']) }}
                <small class="text-danger">{{ $errors->first('visa_expiry_date') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('application') ? ' has-error' : '' }} mb-3">
            {{ Form::label('application', 'Application', ['class' => 'col-sm-6 control-label','for'=>'application']) }}
            <div class="col-sm-9">
                {{ Form::text('application', null, ['class' => 'form-control','placeholder' => 'Enter application','id'=>'application']) }}
                <small class="text-danger">{{ $errors->first('application') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('assignee_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('assignee_id', 'Assignee', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('assignee_id', $assignees, null , ['class' => 'form-control select2', 'disabled']) }}
                <small class="text-danger">{{ $errors->first('assignee_id') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('followers') ? ' has-error' : '' }} mb-3">
            {{ Form::label('followers', 'Followers', ['class' => 'col-sm-6 control-label','for'=>'followers']) }}
            <div class="col-sm-9">
                {{ Form::text('followers', null, ['class' => 'form-control','placeholder' => 'Enter followers','id'=>'followers']) }}
                <small class="text-danger">{{ $errors->first('followers') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }} mb-3">
            {{ Form::label('source', 'Source', ['class' => 'col-sm-6 control-label','for'=>'source']) }}
            <div class="col-sm-9">
                {{ Form::text('source', null, ['class' => 'form-control','placeholder' => 'Enter source','id'=>'source']) }}
                <small class="text-danger">{{ $errors->first('source') }}</small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('tag_name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('tag_name', 'Tag Name', ['class' => 'col-sm-6 control-label','for'=>'tag_name']) }}
            <div class="col-sm-9">
                {{ Form::text('tag_name', null, ['class' => 'form-control','placeholder' => 'Enter tag_name','id'=>'tag_name']) }}
                <small class="text-danger">{{ $errors->first('tag_name') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }} mb-3">
            {{ Form::label('rating', 'Rating', ['class' => 'col-sm-6 control-label','for'=>'rating']) }}
            <div class="col-sm-9">
                {{ Form::number('rating', null, ['class' => 'form-control','placeholder' => 'Enter rating','id'=>'rating']) }}
                <small class="text-danger">{{ $errors->first('rating') }}</small>
            </div>
        </div>
    </div>
</div>
