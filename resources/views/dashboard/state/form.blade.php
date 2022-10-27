<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('country_id', 'Country', ['class' => 'col-sm-6 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('country_id', $countries, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('country_id') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label','for'=>'name']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
