<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name',
        'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }} mb-3">
    {{ Form::label('permission', 'permission', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('permission[]', $permissions, null, ['class' => 'select2 form-control ','multiple'=>'multiple', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('permission') }}</small>
    </div>
</div>
