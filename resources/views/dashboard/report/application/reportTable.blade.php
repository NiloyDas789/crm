 <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Workflows') }}</th>
                                <th>{{ __('Partner') }}</th>
                                <th>{{ __('Product') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applications as $key => $ap)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ route('application.edit', $ap->id) }}">
                                            {{ $ap->product->name  ?? '' }}
                                        </a>
                                    </td>
                                    <td>{{ $ap->workflow->name ?? '' }}</td>
                                    <td>{{ $ap->partner->name ?? '' }}</td>
                                    <td>{{ $ap->product->name ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
