 <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Number') }}</th>
                                <th>{{ __('Email') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($en as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                            {{ $item->fullname()  ?? '' }}
                                    </td>
                                    <td>{{ $item->rating ?? '' }}</td>
                                    <td>{{ $item->phone ?? '' }}</td>
                                    <td>{{ $item->email ?? '' }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    {{ $en->links() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
