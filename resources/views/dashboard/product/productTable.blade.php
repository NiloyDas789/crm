<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>{{ __('ID')}}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Partner') }}</th>
        <th>{{ __('Branch') }}</th>
        <th class="action">{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->sl}}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->name }}</td>
            <td nowrap="nowrap">
                {{-- <a class="btn btn-info" href="{{ route('product.show', $product->id) }}"><i class="fas fa-eye"></i></a> --}}
                {{-- Edit Modal --}}
                <button type="button" class="btn btn-primary btn-md waves-effect waves-light"
                        data-bs-toggle="modal" data-bs-target="#edit{{$product->id}}"><i
                        class="fas fa-edit"></i></button>
                <!-- sample modal content -->
                <div id="edit{{$product->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            {{ Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
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
                                @include('dashboard.product.form')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Update
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{ Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id], 'style' => 'display:inline']) }}
                {{ Form::button('<i class="fas fa-trash"  aria-hidden="true"></i>', ['class' => 'btn btn-danger btm-md', 'type' => 'submit']) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
