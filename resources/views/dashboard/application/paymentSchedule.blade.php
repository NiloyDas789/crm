<button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#paymentSchedule">+ Setup Payment Schedule</button>
<div class="modal fade bs-example-modal-center"   id="paymentSchedule" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Payment Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('client_name', 'Client Name', ['class' => 'col-sm-6 control-label','for'=>'client_name']) }}
                            <div class="col-sm-9">
                                {{ Form::text('client_name', $client->first_name,  ['class' => 'form-control','placeholder' => 'Enter client name','id'=>'client_name', 'disabled']) }}
                                <small class="text-danger">{{ $errors->first('client_name') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group{{ $errors->has('application') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('application', 'Application', ['class' => 'col-sm-6 control-label','for'=>'application']) }}
                            <div class="col-sm-9">
                                {{ Form::text('application', $application->product->name, ['class' => 'form-control','placeholder' => 'Enter application','id'=>'application', 'disabled']) }}
                                <small class="text-danger">{{ $errors->first('application') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group{{ $errors->has('installment_name') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('installment_name', 'Installment Name', ['class' => 'col-sm-12 control-label','for'=>'installment_name']) }}
                            <div class="col-sm-9">
                                {{ Form::text('installment_name', null, ['class' => 'form-control','placeholder' => 'Enter Installment Name','id'=>'installment_name', 'required']) }}
                                <small class="text-danger">{{ $errors->first('installment_name') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group{{ $errors->has('installment_date') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('installment_date', 'Installment Date', ['class' => 'col-sm-12 control-label','for'=>'installment_date']) }}
                            <div class="col-sm-9">
                                {{ Form::date('installment_date', null, ['class' => 'form-control','placeholder' => 'Enter installment_date','id'=>'installment_date', 'required']) }}
                                <small class="text-danger">{{ $errors->first('installment_date') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


