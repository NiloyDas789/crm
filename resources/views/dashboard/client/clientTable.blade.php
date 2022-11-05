<table id="datatable" class="table table-striped  table-bordered table-responsive nowrap">
    <thead>
    <tr>
        <th>{{ __('ID')}}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Tag') }}</th>
        <th>{{ __('Rating') }}</th>
        <th>{{ __('Client Id') }}</th>
        <th>{{ __('Number') }}</th>
        <th>{{ __('Passport Number') }}</th>
        <th>{{ __('Email') }}</th>
        <th class="action">{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($clients as $client)
        <tr>
            <td>{{ $client->sl}}</td>
            <td><a href="{{route('application.index',$client->id)}}">{{ $client->first_name }} {{ $client->last_name }} </a></td>
            <td>{{ $client->tag}}</td>
            <td>{{ $client->rating}}</td>
            <td>{{ $client->client_id}}</td>
            <td>{{ $client->phone}}</td>
            <td>{{ $client->passport_number}}</td>
            <td>{{ $client->email}}</td>
            <td nowrap="nowrap">
                {{-- <a class="btn btn-info" href="{{ route('client.show', $client->id) }}"><i class="fas fa-eye"></i></a> --}}
                {{-- Edit Modal --}}
                <button onclick="editData(this)" type="button" class="btn btn-primary btn-md waves-effect waves-light"
                        data-bs-toggle="modal" data-bs-target="#edit{{$client->id}}"><i
                        class="fas fa-edit"></i></button>
                <!-- sample modal content -->
                <div id="edit{{$client->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            {{ Form::model($client, ['route' => ['client.update', $client->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
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
                                @include('dashboard.client.form')
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
                {{ Form::open(['method' => 'DELETE', 'route' => ['client.destroy', $client->id], 'style' => 'display:inline']) }}
                {{ Form::button('<i class="fas fa-trash"  aria-hidden="true"></i>', ['class' => 'btn btn-danger btm-md', 'type' => 'submit']) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
