<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>{{ __('ID')}}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Created At') }}</th>
        <th class="action">{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($productTypes as $productType)
        <tr>
            <td>{{ $productType->sl}}</td>
            <td>{{ $productType->name }}</td>
            <td>{{ $productType->created_at->format('Y-m-d') }}</td>
            <td nowrap="nowrap">
                {{-- <a class="btn btn-info" href="{{ route('productType.show', $productType->id) }}"><i class="fas fa-eye"></i></a> --}}
                {{-- Edit Modal --}}
                <button type="button" class="btn btn-primary btn-md waves-effect waves-light"
                        data-bs-toggle="modal" data-bs-target="#edit{{$productType->id}}"><i
                        class="fas fa-edit"></i></button>
                <!-- sample modal content -->
                <div id="edit{{$productType->id}}" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit ProductType</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            {{ Form::model($productType, ['route' => ['productType.update', $productType->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @include('dashboard.productType.form')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                            {{ Form::close() }}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{ Form::open(['method' => 'DELETE', 'route' => ['productType.destroy', $productType->id], 'style' => 'display:inline']) }}
                {{ Form::button('<i class="fas fa-trash"  aria-hidden="true"></i>', ['class' => 'btn btn-danger btm-md', 'type' => 'submit']) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
