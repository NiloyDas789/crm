<div class="row">
    @include('dashboard.application.profile')
    <div class="col-md-9">
        <div class="card card-body">
            <div class="row">
                <div class="col-4">
                    <div>
                        <h3>In Progress</h3>
                    </div>
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
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">

                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Note"><i class="mdi mdi-file-document-multiple"></i></button>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Document"><i class="mdi mdi-note-plus"></i></button>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Date"><i class="mdi mdi-calendar-month"></i></button>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Send Email"><i class="mdi mdi-email"></i></button>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="tab-pane" id="custom-documents" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane" id="custom-notes" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten carles.
                            </p>
                        </div>
                        <div class="tab-pane" id="custom-tasks" role="tabpanel">
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
