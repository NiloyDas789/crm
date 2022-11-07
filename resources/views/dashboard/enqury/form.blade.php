<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label','for'=>'name']) }}
    <div class="col-sm-12">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
    {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label','for'=>'email']) }}
    <div class="col-sm-12">
        {{ Form::text('email', null, ['class' => 'form-control','placeholder' => 'Enter email','id'=>'email', 'required']) }}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} mb-3">
    {{ Form::label('mobile', 'Mobile', ['class' => 'col-sm-3 control-label','for'=>'mobile']) }}
    <div class="col-sm-12">
        {{ Form::text('mobile', null, ['class' => 'form-control','placeholder' => 'Enter mobile','id'=>'mobile', 'required']) }}
        <small class="text-danger">{{ $errors->first('mobile') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('higher_level_education') ? ' has-error' : '' }} mb-3">
    {{ Form::label('higher_level_education', 'Higher level of education', ['class' => 'col-sm-6 control-label','for'=>'higher_level_education']) }}
    <div class="col-sm-12">
        {{ Form::text('higher_level_education', null, ['class' => 'form-control','placeholder' => 'Enter higher level education','id'=>'higher_level_education', 'required']) }}
        <small class="text-danger">{{ $errors->first('higher_level_education') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }} mb-3">
    {{ Form::label('comment', 'Comment', ['class' => 'col-sm-3 control-label','for'=>'comment']) }}
    <div class="col-sm-12">
        {{ Form::textarea('comment', null, ['class' => 'form-control','placeholder' => 'Enter comment','id'=>'comment', 'required']) }}
        <small class="text-danger">{{ $errors->first('comment') }}</small>
    </div>
</div>
