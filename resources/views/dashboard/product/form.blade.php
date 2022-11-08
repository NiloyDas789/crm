<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-6 control-label','for'=>'name']) }}
            <div class="col-sm-9">
                {{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter name','id'=>'name', 'required']) }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('partner_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('partner_id', 'Partner', ['class' => 'col-sm-6 control-label']) }}
                <div class="row">
                    <div class="col-sm-9">
                        {{ Form::select('partner_id', $partners, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                        <small class="text-danger">{{ $errors->first('partner_id') }}</small>

                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('partner.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('office_id', 'Office', ['class' => 'col-sm-6 control-label']) }}

            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('office_id', $offices, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'branch_id', 'required' => 'required', 'placeholder' => 'Select Office']) }}
                    <small class="text-danger">{{ $errors->first('office_id') }}</small>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('office.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('product_type_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('product_type_id', 'Product Type', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('product_type_id', $productTypes, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('product_type_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('productType.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('revenue_type_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('revenue_type_id', 'Revenue Type', ['class' => 'col-sm-6 control-label']) }}
            <div class="row">
                <div class="col-sm-9">
                    {{ Form::select('revenue_type_id', $revenueTypes, null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                    <small class="text-danger">{{ $errors->first('revenue_type_id') }}</small>

                </div>
                <div class="col-sm-3">
                    <a href="{{route('revenueType.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }} mb-3">
            {{ Form::label('duration', 'Duration (Months)', ['class' => 'col-sm-6 control-label','for'=>'duration']) }}
            <div class="col-sm-9">
                {{ Form::text('duration', null, ['class' => 'form-control','placeholder' => 'Enter duration months','id'=>'duration', 'required']) }}
                <small class="text-danger">{{ $errors->first('duration') }}</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('intake_month_id') ? ' has-error' : '' }} mb-3">
            {{ Form::label('intake_month_id', 'Intake Month', ['class' => 'col-sm-6 control-label']) }}
            <div class="col-sm-9">
                {{ Form::selectMonth('intake_month_id', null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('intake_month_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }} mb-3">
            {{ Form::label('note', 'Note', ['class' => 'col-sm-6 control-label','for'=>'note']) }}
            <div class="col-sm-9">
                {{ Form::text('note', null, ['class' => 'form-control','placeholder' => 'Enter note','id'=>'note', 'required']) }}
                <small class="text-danger">{{ $errors->first('note') }}</small>
            </div>
        </div>
    </div>
</div>

<div class="col-6">
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} mb-3">
        {{ Form::label('description', 'Description', ['class' => 'col-sm-6 control-label','for'=>'description']) }}
        <div class="col-sm-9">
            {{ Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Enter description','rows'=>'3','id'=>'description', 'required']) }}
            <small class="text-danger">{{ $errors->first('note') }}</small>
        </div>
    </div>
</div>

