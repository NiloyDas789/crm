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
            <img src="{{ $partner->image ?? null }}" class="rounded" width="100px" id="imagePP">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('master_category_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('master_category_id', 'Master Category', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('master_category_id', $categories, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('master_category_id') }}</small>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group{{ $errors->has('partner_type_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('partner_type_id', 'Partner Type', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('partner_type_id', $partnerTypes, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'partner_type_id', 'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('partner_type_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('partnerType.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="form-group{{ $errors->has('business_registration_number') ? ' has-error' : '' }} mb-3">
            {{ Form::label('business_registration_number', 'Business Registration Number', ['class' => 'col-sm-12 control-label','for'=>'business_registration_number']) }}
            <div class="col-sm-9">
                {{ Form::text('business_registration_number', null, ['class' => 'form-control','placeholder' => 'Enter business_registration_number','id'=>'business_registration_number', 'required']) }}
                <small class="text-danger">{{ $errors->first('business_registration_number') }}</small>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('service_workflow_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('service_workflow_id', 'Service Workflow', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('service_workflow_id', $serviceWorkflows, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('service_workflow_id') }}</small>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('currency_id', 'Currency', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('currency_id', $currencies, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'currency_id', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('currency_id') }}</small>

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
        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }} mb-3">
            {{ Form::label('fax', 'Fax', ['class' => 'col-sm-6 control-label','for'=>'fax']) }}
            <div class="col-sm-9">
                {{ Form::text('fax', null, ['class' => 'form-control','placeholder' => 'Enter fax','id'=>'fax', 'required']) }}
                <small class="text-danger">{{ $errors->first('fax') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} mb-3">
            {{ Form::label('website', 'Website', ['class' => 'col-sm-6 control-label','for'=>'website']) }}
            <div class="col-sm-9">
                {{ Form::text('website', null, ['class' => 'form-control','placeholder' => 'Enter website','id'=>'website', 'required']) }}
                <small class="text-danger">{{ $errors->first('website') }}</small>
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


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} mb-3">
            {{ Form::label('zip_code', 'Zip Code', ['class' => 'col-sm-6 control-label','for'=>'zip_code']) }}
            <div class="col-sm-9">
                {{ Form::text('zip_code', null, ['class' => 'form-control','placeholder' => 'Enter zip_code','id'=>'zip_code', 'required']) }}
                <small class="text-danger">{{ $errors->first('zip_code') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('office_id', 'Office', ['class' => 'col-sm-6 control-label']) }}

            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('office_id', $offices, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'branch_id', 'required' => 'required', 'placeholder' => 'Select Office']) }}
                    <small class="text-danger">{{ $errors->first('office_id') }}</small>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('office.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>



