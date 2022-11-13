
@extends('layouts.master')

@section('title','Dashboard')


@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upzet</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div id="radialchart-1" class="apex-charts" dir="ltr"></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">{{ __('Total Application') }}</p>
                                <h5 class="mb-3">{{ \App\Models\Dashboard\Application::count() }}</h5>
                                <p class="text-truncate mb-0"><span class="text-success me-2"> 0.02% <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div id="radialchart-2" class="apex-charts" dir="ltr"></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total inquiries</p>
                                <h5 class="mb-3">{{ \App\Models\Dashboard\Enqury::count()  }}</h5>
                                <p class="text-truncate mb-0"><span class="text-success me-2"> 1.7% <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div id="radialchart-3" class="apex-charts" dir="ltr"></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Today Appointment</p>
                                <h5 class="mb-3">{{ \App\Models\Dashboard\Appointment::count() }}</h5>
                                <p class="text-truncate mb-0"><span class="text-danger me-2"> 0.01% <i class="ri-arrow-right-down-line align-bottom ms-1"></i></span> From previous</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total client</p>
                                <h5 class="mb-3">{{ \App\Models\Dashboard\Client::count() }}</h5>
                                <p class="text-truncate mb-0"><span class="text-success me-2"> 0.01% <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        {{--    <div class="row">--}}
        {{--        <div class="col-xl-8">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="d-flex align-items-center">--}}
        {{--                        <div class="flex-grow-1">--}}
        {{--                            <h5 class="card-title">Overview</h5>--}}
        {{--                        </div>--}}
        {{--                        <div class="flex-shrink-0">--}}
        {{--                            <div>--}}
        {{--                                <button type="button" class="btn btn-soft-secondary btn-sm">--}}
        {{--                                    ALL--}}
        {{--                                </button>--}}
        {{--                                <button type="button" class="btn btn-soft-primary btn-sm">--}}
        {{--                                    1M--}}
        {{--                                </button>--}}
        {{--                                <button type="button" class="btn btn-soft-secondary btn-sm">--}}
        {{--                                    6M--}}
        {{--                                </button>--}}
        {{--                                <button type="button" class="btn btn-soft-secondary btn-sm active">--}}
        {{--                                    1Y--}}
        {{--                                </button>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <div>--}}
        {{--                        <div id="mixed-chart" class="apex-charts" dir="ltr"></div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- end card-body -->--}}

        {{--                <div class="card-body border-top">--}}
        {{--                    <div class="text-muted text-center">--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-4 border-end">--}}
        {{--                                <div>--}}
        {{--                                    <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-primary me-1"></i> Expenses</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">$ 8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>1.2 %</span></h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-4 border-end">--}}
        {{--                                <div>--}}
        {{--                                    <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-light me-1"></i> Maintenance</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">$ 8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>2.0 %</span></h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-4">--}}
        {{--                                <div>--}}
        {{--                                    <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-danger me-1"></i> Profit</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">$ 8,524 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>0.4 %</span></h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- end card-body -->--}}
        {{--            </div>--}}
        {{--            <!-- end card -->--}}
        {{--        </div>--}}
        {{--        <!-- end col -->--}}

        {{--        <div class="col-xl-4">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="d-flex  align-items-center">--}}
        {{--                        <div class="flex-grow-1">--}}
        {{--                            <h5 class="card-title">Social Source</h5>--}}
        {{--                        </div>--}}
        {{--                        <div class="flex-shrink-0">--}}
        {{--                            <select class="form-select form-select-sm mb-0 my-n1">--}}
        {{--                                <option value="MAY" selected="">May</option>--}}
        {{--                                <option value="AP">April</option>--}}
        {{--                                <option value="MA">March</option>--}}
        {{--                                <option value="FE">February</option>--}}
        {{--                                <option value="JA">January</option>--}}
        {{--                                <option value="DE">December</option>--}}
        {{--                            </select>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <div>--}}
        {{--                        <div id="radialBar-chart" class="apex-charts" dir="ltr"></div>--}}
        {{--                    </div>--}}

        {{--                    <div class="row">--}}
        {{--                        <div class="col-4">--}}
        {{--                            <div class="social-source text-center mt-3">--}}
        {{--                                <div class="avatar-xs mx-auto mb-3">--}}
        {{--                                    <span class="avatar-title rounded-circle bg-primary font-size-18">--}}
        {{--                                        <i class="ri  ri-facebook-circle-fill text-white"></i>--}}
        {{--                                    </span>--}}
        {{--                                </div>--}}
        {{--                                <h5 class="font-size-15">Facebook</h5>--}}
        {{--                                <p class="text-muted mb-0">125 sales</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-4">--}}
        {{--                            <div class="social-source text-center mt-3">--}}
        {{--                                <div class="avatar-xs mx-auto mb-3">--}}
        {{--                                    <span class="avatar-title rounded-circle bg-info font-size-18">--}}
        {{--                                        <i class="ri  ri-twitter-fill text-white"></i>--}}
        {{--                                    </span>--}}
        {{--                                </div>--}}
        {{--                                <h5 class="font-size-15">Twitter</h5>--}}
        {{--                                <p class="text-muted mb-0">112 sales</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-4">--}}
        {{--                            <div class="social-source text-center mt-3">--}}
        {{--                                <div class="avatar-xs mx-auto mb-3">--}}
        {{--                                    <span class="avatar-title rounded-circle bg-danger font-size-18">--}}
        {{--                                        <i class="ri ri-instagram-line text-white"></i>--}}
        {{--                                    </span>--}}
        {{--                                </div>--}}
        {{--                                <h5 class="font-size-15">Instagram</h5>--}}
        {{--                                <p class="text-muted mb-0">104 sales</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- end card-body -->--}}
        {{--            </div>--}}
        {{--            <!-- end card -->--}}
        {{--        </div>--}}
        {{--        <!-- end col -->--}}
        {{--    </div>--}}
        <!-- end row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application</h4>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover">
                                <tr>
                                    <th>Product</th>
                                    <th>Partner</th>
                                    <th>Workflows</th>
                                </tr>
                                @forelse(applications() as $key => $application)
                                    <tr>
                                        <td>
                                            <a href="{{ route('application.edit', $application->id) }}">
                                                {{ $application->product->name ?? ''}}
                                            </a>
                                        </td>
                                        <td>{{ $application->partner->name ?? ''}}</td>
                                        <td>{{ $application->workflow->name ?? '' }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('task.note.store') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="note" placeholder="Enter Note . . . . . ">
                                </div>
                                <button class="btn btn-dark btn-sm">Note</button>

                            </div>
                        </form>
                        <div class="note_content">
                            <ul>
                                @forelse(taskNote() as $note)
                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <div>{{$note->note}}</div>
                                        <span><a href="{{ route('task.note.delete', $note->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a></span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center">
                                        No Task Note
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>


    </div>
@endsection

@push('script')
    <!-- apexcharts js -->
    <script src="{{ asset('/') }}assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- jquery.vectormap map -->
    <script src="{{ asset('/') }}assets/libs/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

@endpush
@push('style')
    <!-- jvectormap -->
    <link href="{{ asset('/') }}assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <style>
        .note_content {
            padding: 10px;
            height: 67vh;
            background: #f5f5f5;
            /* margin: 0px; */
        }

        .note_content ul li {
            border-bottom: 1px solid #bdbdbd;
            list-style: none;
            font-size: 18px;
            transition: .5s;
            cursor: pointer;
            padding: 13px;
        }
        .note_content ul li:hover {
    background: #e3d8d8;
}

        .note_content ul {
            margin: 0;
            padding: 0;
        }
    </style>
@endpush
