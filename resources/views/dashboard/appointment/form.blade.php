
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('related_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('related_id', 'Related To', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('related_id', ['1'=>'Client','2'=>'Partner'], null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('related_id') }}</small>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('user_id', 'Added By', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::text('user_id',  auth()->user()->name, ['class' => 'form-control','disabled', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('user_id') }}</small>

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('client_id', 'Client Id', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('client_id', [], null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('client.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('timezone_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('timezone_id', 'Time Zone', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('timezone_id', [], null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('timezone_id') }}</small>

            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }} mb-3">
            {{ Form::label('date', 'Date', ['class' => 'col-sm-6 control-label','for'=>'date']) }}
            <div class="col-sm-9">
                {{ Form::date('date', null, ['class' => 'form-control','placeholder' => 'Enter date','id'=>'date', 'required']) }}
                <small class="text-danger">{{ $errors->first('date') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }} mb-3">
            {{ Form::label('time', 'Time', ['class' => 'col-sm-6 control-label','for'=>'time']) }}
            <div class="col-sm-9">
                {{ Form::time('time', null, ['class' => 'form-control','placeholder' => 'Enter time','id'=>'time', 'required']) }}
                <small class="text-danger">{{ $errors->first('time') }}</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} mb-3">
            {{ Form::label('title', 'Title', ['class' => 'col-sm-6 control-label','for'=>'title']) }}
            <div class="col-sm-9">
                {{ Form::text('title', null, ['class' => 'form-control','placeholder' => 'Enter title','id'=>'title', 'required']) }}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} mb-3">
            {{ Form::label('description', 'Description', ['class' => 'col-sm-6 control-label','for'=>'description']) }}
            <div class="col-sm-9">
                {{ Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Enter description','id'=>'description', 'required']) }}
                <small class="text-danger">{{ $errors->first('description') }}</small>
            </div>
        </div>
    </div>
</div>

