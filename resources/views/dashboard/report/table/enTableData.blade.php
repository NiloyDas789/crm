 <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Mobile') }}</th>
                                <th>{{ __('Higher level of education') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($en as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                            {{ $item->name  ?? '' }}
                                    </td>
                                    <td>{{ $item->email ?? '' }}</td>
                                    <td>{{ $item->mobile ?? '' }}</td>
                                    <td>{{ $item->higher_level_education ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
