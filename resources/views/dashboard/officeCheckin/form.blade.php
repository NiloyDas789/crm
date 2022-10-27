
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }} mb-3">
            {{ Form::label('date', 'Date', ['class' => 'col-sm-6 control-label','for'=>'date']) }}
            <div class="col-sm-9">
                {{ Form::date('date', null, ['class' => 'form-control','placeholder' => 'Enter date','id'=>'date', 'required']) }}
                <small class="text-danger">{{ $errors->first('date') }}</small>
            </div>
        </div>
        <div class="form-group{{ $errors->has('wait_time') ? ' has-error' : '' }} mb-3">
            {{ Form::label('wait_time', 'Wait time', ['class' => 'col-sm-6 control-label','for'=>'wait_time']) }}
            <div class="col-sm-9">
                {{ Form::time('wait_time', null, ['class' => 'form-control','placeholder' => 'Enter wait_time','id'=>'wait_time', 'required']) }}
                <small class="text-danger">{{ $errors->first('wait_time') }}</small>
            </div>
        </div>

        <div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('contact_id', 'Select Contact', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('contact_id', $contacts, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()', 'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('contact_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('contact.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>

        </div>
        <div class="form-group{{ $errors->has('assignee_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('assignee_id', 'Select Contact', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::select('assignee_id', $assignees,null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'onClick'=>'fetchStates()','disabled', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('assignee_id') }}</small>

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }} mb-3">
            {{ Form::label('start', 'Start time', ['class' => 'col-sm-6 control-label','for'=>'start']) }}
            <div class="col-sm-9">
                {{ Form::time('start', null, ['class' => 'form-control','placeholder' => 'Enter start','id'=>'start', 'required']) }}
                <small class="text-danger">{{ $errors->first('start') }}</small>
            </div>
        </div>
        <div class="form-group{{ $errors->has('visit_purpose') ? ' has-error' : '' }} mb-3">
            {{ Form::label('visit_purpose', 'Visit Purpose', ['class' => 'col-sm-6 control-label','for'=>'visit_purpose']) }}
            <div class="col-sm-9">
                {{ Form::textarea('visit_purpose', null, ['class' => 'form-control','placeholder' => 'Enter visit_purpose','rows'=>'8','id'=>'visit_purpose', 'required']) }}
                <small class="text-danger">{{ $errors->first('visit_purpose') }}</small>
            </div>
        </div>

    </div>

</div>










