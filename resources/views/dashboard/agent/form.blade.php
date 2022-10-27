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
            <img src="{{$agent->image ?? ''}}" class="rounded" width="100px" >
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
        {{ Form::label('agent_type', 'Agent Type', ['class' => 'col-sm-12 control-label']) }}
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agent_type" id="agent_type1" value="super_agent" checked="">
                <label class="form-check-label" for="agent_type1">
                    Super Agent
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agent_type" id="agent_type2" value="sub_agent">
                <label class="form-check-label" for="agent_type2">
                    Sub Agent
                </label>
            </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('agent_structure') ? ' has-error' : '' }} mb-3">
            {{ Form::label('agent_structure', 'Agent Structure', ['class' => 'col-sm-6 control-label','for'=>'agent_structure']) }}
            <div class="col-sm-9">
                {{ Form::text('agent_structure', null, ['class' => 'form-control','placeholder' => 'Enter agent_structure','id'=>'agent_structure', 'required']) }}
                <small class="text-danger">{{ $errors->first('agent_structure') }}</small>
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
        <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('office_id', 'Office', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('office_id', $offices , null, ['class' => 'form-control select2','style'=>'width: 100%',  'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('office_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('office.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
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
