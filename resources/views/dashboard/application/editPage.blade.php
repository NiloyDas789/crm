<div class="row">
    @include('dashboard.application.profile')
    <div class="col-md-9">
        <div class="card card-body">
            <div class="row d-flex justify-content-between">

                <div class="col-md-4">
                    <h3>In Progress</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light"><i class="mdi mdi-chevron-left "></i> Back to Previous Stage</button>
                    <button type="button" class="btn btn-success btn-sm waves-effect waves-light">Proceed To Next Stage <i class="mdi mdi-chevron-right "></i></button>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-3">
                            <div>
                                <div>
                                    Course:
                                </div>
                                <div>
                                    {{$application->product->name}}
                                </div>
                            </div>
                            <div>
                                <div>
                                    Application Id:
                                </div>
                                <div>
                                    {{$application->id}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <div>
                                    University:
                                </div>
                                <div>

                                </div>
                            </div>
                            <div>
                                <div>
                                    Parent's Client Id
                                </div>
                                <div>
                                    {{$application->client->name}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <div>
                                    Branch:

                                </div>
                                <div>
                                    {{$application->branch->name}}

                                </div>
                            </div>
                            <div>
                                <div>
                                    Started At:

                                </div>
                                <div>
                                    {{$application->started_at}}

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <div>
                                    Workflow:

                                </div>
                                <div>
                                    {{$application->workflow->name}}

                                </div>
                            </div>
                            <div>
                                <div>
                                    Last Updated:

                                </div>
                                <div>
                                    {{$application->updated_at}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <hr />

            <div class="row">
                <div class="col-9">
                    <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#custom-activities" role="tab">
                                <span class="d-none d-md-inline-block">Activities</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#custom-documents" role="tab">
                                <span class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#custom-notes" role="tab">
                                <span class="d-none d-md-inline-block">Notes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#custom-tasks" role="tab">
                                <span class="d-none d-md-inline-block">Tasks</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#custom-schedules" role="tab">
                                <span class="d-none d-md-inline-block">Payment Schedule</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="custom-activities" role="tabpanel">
                            <ul class="list-group">
                                @foreach($tasks as $task)
                                    <li class="list-group-item  d-flex justify-content-between list-group-item-primary" aria-current="true">
                                        <div class=" d-flex  gap-2">
                                            <div class="bg-white rounded">
                                                <input class="form-check-input m-1 " type="checkbox" value="" id="flexCheckCheckedDisabled" checked  disabled>
                                            </div>
                                            <div>
                                                {{$task->title}}
                                            </div>
                                        </div>
                                        @include('dashboard.application.taskButtons')
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="tab-pane" id="custom-documents" role="tabpanel">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>{{ __('ID')}}</th>
                                    <th>{{ __('Name') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documents as $key=>$document)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $document->url }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane" id="custom-notes" role="tabpanel">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>{{ __('ID')}}</th>
                                    <th>{{ __('Name') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($notes as $key=>$note)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $note->note }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="custom-tasks" role="tabpanel">
                            <ul class="list-group">
                                @foreach($tasks as $task)
                                    <li class="list-group-item  d-flex justify-content-between list-group-item-primary" aria-current="true">
                                        <div class=" d-flex  gap-2">
                                            <div class="bg-white rounded">
                                                <input class="form-check-input m-1 " type="checkbox" value="" id="flexCheckCheckedDisabled" checked  disabled>
                                            </div>
                                            <div>
                                                {{$task->title}}
                                            </div>
                                        </div>
                                        <div>

                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="tab-pane" id="custom-schedules" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-3 " style="border-left: 1px solid;">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="mb-2"><b> Applied Intake</b></div>
                            <div>
                                {!! Form::date('date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="border p-1">
                            <div class="col-12 mr-4 mt-4 font-bold font-weight-bold">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-3 border"><b>Start</b> </div>
                                    <div class="col-3 border"><b>End</b></div>
                                </div>
                            </div>
                            <div class="col-12 mr-4 mb-4 font-bold  ">
                                <div class="row d-flex justify-content-around ">
                                    <div class="col-3 border p-1">
                                        <div class="text-center font-bold">+</div>
                                        <div>
                                            {!! Form::date('date', null, ['class' => 'form-control', 'required' =>
                                            'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-3 border p-1">
                                        <div class="text-center font-bold">+</div>
                                        <div>
                                            {!! Form::date('date', null, ['class' => 'form-control', 'required' =>
                                            'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="col-12 d-flex justify-content-center my-4">
                            @include('dashboard.application.paymentSchedule')
                        </div>
                        <hr />
                        <div class="d-grid gap-3 mt-3">
                            <div class="d-flex justify-content-between fw-bold">
                                <div> Product Fees </div>
                                <div> 0.00</div>
                            </div>
                            <div class="d-flex justify-content-between my-8">
                                <div> Total Fee</div>
                                <div> 0.00</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-primary"> Discount</div>
                                <div> 0.00</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-danger"> Net Fee:</div>
                                <div> 0.00</div>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <div class="fw-bold">
                                Started By:
                            </div>
                            <div class="">
                                {{$application->assignee?->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
