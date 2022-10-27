<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} mb-3">
    {{ Form::label('code', 'Code', ['class' => 'col-sm-3 control-label','for'=>'code']) }}
    <div class="col-sm-9">
        {{ Form::text('code', null, ['class' => 'form-control','placeholder' => 'Enter code','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('code') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label','for'=>'name']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('phonecode') ? ' has-error' : '' }} mb-3">
    {{ Form::label('phonecode', 'Phone Code', ['class' => 'col-sm-3 control-label','for'=>'phonecode']) }}
    <div class="col-sm-9">
        {{ Form::text('phonecode', null, ['class' => 'form-control','placeholder' => 'Enter phonecode','id'=>'phonecode', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
