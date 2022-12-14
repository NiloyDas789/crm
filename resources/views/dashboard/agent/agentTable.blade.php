<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap table-sm table-hover">
    <thead>
    <tr>
        <th>{{ __('ID')}}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Office') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>{{ __('Email') }}</th>
        <th>{{ __('Agent Type') }}</th>
        <th class="action">{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($agents as $agent)
        <tr>
            <td>{{ $agent->sl}}</td>
            <td>{{ $agent->name }}</td>
            <td>
                <ul>
                    <li><b>Name : </b>{{ $agent->office->name }}</li>
                    <li><b>Street : </b> {{ $agent->office->street  }}</li>
                    <li> <b>Email : </b> {{ $agent->office->email  }}</li>
                    <li> <b>Mobile : </b>{{ $agent->office->mobile  }}</li>
                </ul>
            </td>
            <td>{{ $agent->phone }}</td>
            <td>{{ $agent->email }}</td>
            <td>{{ $agent->agent_type }}</td>
            <td nowrap="nowrap">
                {{-- <a class="btn btn-info" href="{{ route('agent.show', $agent->id) }}"><i class="fas fa-eye"></i></a> --}}
                {{-- Edit Modal --}}
                <button type="button" class="btn btn-primary btn-md waves-effect waves-light"
                        data-bs-toggle="modal" data-bs-target="#edit{{$agent->id}}"><i
                        class="fas fa-edit"></i></button>
                <!-- sample modal content -->
                <div id="edit{{$agent->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit Agent</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            {{ Form::model($agent, ['route' => ['agent.update', $agent->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
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
                                @include('dashboard.agent.form')
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
                {{ Form::open(['method' => 'DELETE', 'route' => ['agent.destroy', $agent->id], 'style' => 'display:inline']) }}
                {{ Form::button('<i class="fas fa-trash"  aria-hidden="true"></i>', ['class' => 'btn btn-danger btm-md', 'type' => 'submit']) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
