<div class="col-md-3">
    <div class="card card-body">
        <div class="text-center">
            <div class="mb-3">
                <img class="rounded-circle" src="{{asset('assets/images/users/avatar-1.jpg')}}">
            </div>
            <div>
                <h1>{{$client->first_name}} {{$client->last_name}}</h1>
            </div>
            <hr />
            <div class="text-start d-grid gap-3 fs-6">
                <div>
                    <h2>Personal Details:</h2>
                </div>
                <div>
                    <div>Tag(s):</div>
                    <div>-</div>
                </div>
                <div>
                    <div>Added From:</div>
                    <div>-</div>
                </div>
                <div>
                    <div>Client Id:</div>
                    <div>{{$client->client_id}}</div>
                </div>
                <div>
                    <div>Internal Id:</div>
                    <div>{{$client->id}}</div>
                </div>
                <div>
                    <div>Date of Birth:</div>
                    <div>{{$client->dob}}</div>
                </div>
                <div>
                    <div>Phone Number:</div>
                    <div>{{$client->phone}}</div>
                </div>
                <div>
                    <div>Email:</div>
                    <div>{{$client->email}}</div>
                </div>
                <div>
                    <div>Address:</div>
                    <div>{{$client->street ?? ''}},
                    </div>
                </div>
                <div>
                    <div>Visa Expiry:</div>
                    <div>
                        {{$client->visa_expiry_date}},
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
