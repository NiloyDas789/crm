{{ Form::hidden('client_id',$client->id)}}
<div class="form-group{{ $errors->has('workflow_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('workflow_id', 'Workflows', ['class' => 'col-sm-6 control-label']) }}
    <div class="row">
        <div class="col-sm-9">
            {{ Form::select('workflow_id', $workflows, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'workflow_id', 'required' => 'required']) }}
            <small class="text-danger">{{ $errors->first('workflow_id') }}</small>

        </div>
        <div class="col-sm-3">
            <a href="{{route('workflow.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
        </div>

    </div>
</div>

<div class="form-group{{ $errors->has('partner_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('partner_id', 'Partner', ['class' => 'col-sm-6 control-label']) }}
    <div class="row">
        <div class="col-sm-9">
            {{ Form::select('partner_id', $partners, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'partner_id', 'required' => 'required']) }}
            <small class="text-danger">{{ $errors->first('partner_id') }}</small>

        </div>
        <div class="col-sm-3">
            <a href="{{route('partner.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
        </div>

    </div>
</div>

<div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('branch_id', 'Branch', ['class' => 'col-sm-6 control-label']) }}
    <div class="row">
        <div class="col-sm-9">
            {{ Form::select('branch_id', $branches, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'branch_id', 'required' => 'required']) }}
            <small class="text-danger">{{ $errors->first('branch_id') }}</small>

        </div>
        <div class="col-sm-3">
            <a href="{{route('branch.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
        </div>

    </div>
</div>

<div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }} mb-3">
    {{ Form::label('product_id', 'Product', ['class' => 'col-sm-6 control-label']) }}
    <div class="row">
        <div class="col-sm-9">
            {{ Form::select('product_id', $products, null, ['class' => 'form-control select2','style'=>'width: 100%',  'id'=>'product_id', 'required' => 'required']) }}
            <small class="text-danger">{{ $errors->first('product_id') }}</small>

        </div>
        <div class="col-sm-3">
            <a href="{{route('product.index')}}" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
        </div>

    </div>
</div>
