 <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Start') }}</th>
                                <th>{{ __('Wait Time') }}</th>
                                <th>{{ __('Visit Purpose') }}</th>
                                <th>{{ __('Contact Name') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                            {{ $item->date  ?? '' }}
                                    </td>
                                    <td>{{ $item->start ?? '' }}</td>
                                    <td>{{ $item->wait_time ?? '' }}</td>
                                    <td>{{ $item->visit_purpose ?? ''}}</td>
                                    <td>{{ $item->contact->name ?? ''}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    {{ $items->links() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
