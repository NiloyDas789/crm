<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name',
        'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
    {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email',
        'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('email') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::password('password', ['class' => 'form-control','placeholder' => 'Enter password',
        'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('password') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
    {{ Form::label('confirm-password', 'Confirm Password', ['class' => 'col-sm-3 control-label'])
    }}
    <div class="col-sm-9">
        {{ Form::password('confirm-password', ['class' => 'form-control','placeholder' => 'Enter password again', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('confirm-password') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }} mb-3">
    {{ Form::label('roles', 'Roles', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('roles', $roles, null, ['class' => 'form-control select2',  'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('roles') }}</small>

    </div>
</div>
