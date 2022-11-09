<div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal"  data-bs-target="#note{{$task->id}}" ><i class="mdi mdi-file-document-multiple"></i></button>
    <div class="modal fade bs-example-modal-center"   id="note{{$task->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{ Form::model($application, ['route' => ['application.update', $application->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }} mb-3">
                                {{ Form::label('note', 'Note', ['class' => 'col-sm-6 control-label','for'=>'note']) }}
                                <div class="col-sm-9">
                                    {{ Form::textarea('note', null,  ['class' => 'form-control','placeholder' => 'Enter Your Note','id'=>'note']) }}
                                    <small class="text-danger">{{ $errors->first('note') }}</small>
                                </div>
                            </div>
                            {{Form::hidden('application_id',$application->id)}}
                            {{Form::hidden('task_id',$task->id)}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
                {{Form::close()}}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal"  data-bs-target="#document{{$task->id}}" ><i class="mdi mdi-note-plus"></i></button>
    <div class="modal fade bs-example-modal-center"   id="document{{$task->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{ Form::model($application, ['route' => ['application.update', $application->id], 'method' => 'PUT','files' => true, 'class' => 'needs-validation', 'novalidate']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} mb-3">
                                {{ Form::label('url', 'Add Document', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-9">
                                    {{ Form::file('url', ['class' => 'filestyle',]) }}
                                    {{-- <p class="help-block">Help block text</p> --}}
                                    <small class="text-danger">{{ $errors->first('url') }}</small>
                                </div>
                            </div>
                            {{Form::hidden('application_id',$application->id)}}
                            {{Form::hidden('task_id',$task->id)}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
                {{Form::close()}}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
{{--    <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Date"><i class="mdi mdi-calendar-month"></i></button>--}}
{{--    <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Send Email"><i class="mdi mdi-email"></i></button>--}}
</div>
