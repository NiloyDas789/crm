<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} mb-3">
    {{ Form::label('title', 'Title', ['class' => 'col-sm-3 control-label','for'=>'title']) }}
    <div class="col-sm-9">
        {{ Form::text('title', null, ['class' => 'form-control','placeholder' => 'Enter title','id'=>'title', 'required']) }}
        <small class="text-danger">{{ $errors->first('title') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('category_id', 'Category', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('category_id') }}</small>

    </div>
</div>


<div class="form-group{{ $errors->has('assignee_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('assignee_id', 'Assignee', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('assignee_id', $assignees, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('assignee_id') }}</small>

    </div>
</div>

<div class="form-group{{ $errors->has('priority_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('priority_id', 'Priority', ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('priority_id', $priorities, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
        <small class="text-danger">{{ $errors->first('priority_id') }}</small>

    </div>
</div>
<div class="form-group{{ $errors->has('due_date') ? ' has-error' : '' }} mb-3">
    {{ Form::label('due_date', 'Due Date', ['class' => 'col-sm-3 control-label','for'=>'due_date']) }}
    <div class="col-sm-9">
        {{ Form::date('due_date', null, ['class' => 'form-control','placeholder' => 'Enter due_date','id'=>'due_date', 'required']) }}
        <small class="text-danger">{{ $errors->first('due_date') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('due_time') ? ' has-error' : '' }} mb-3">
    {{ Form::label('due_time', 'Due Time', ['class' => 'col-sm-3 control-label','for'=>'due_time']) }}
    <div class="col-sm-9">
        {{ Form::time('due_time', null, ['class' => 'form-control','placeholder' => 'Enter due_time','id'=>'due_time', 'required']) }}
        <small class="text-danger">{{ $errors->first('due_time') }}</small>
    </div>
</div>
