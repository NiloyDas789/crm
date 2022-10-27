<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label','for'=>'name']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
