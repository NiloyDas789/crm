<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label','for'=>'name']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('task_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('task_id', 'Select Tasks', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('task_id[]', $tasks, null, ['class' => 'form-control
        select2','multiple'=>'multiple', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('task_id') }}</small>
    </div>
</div>
