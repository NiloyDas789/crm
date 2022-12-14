<div class="col-md-3">
    <div class="card card-body">
        <div class="text-center">
            <div class="mb-3">
                 <img src="{{asset('storage/' . $client->image) }}" class="rounded-circle img-fluid"  alt="">
            </div>
            <div>
                <h3>{{$client->first_name}} {{$client->last_name}}</h3>
            </div>
            <hr />
            <div class="text-start d-grid gap-3 fs-6">
                <div>
                    <h4>Personal Details:</h4>
                </div>
                <div>
                    <div>Tag(s):</div>
                    <div class="fw-bold">-</div>
                </div>
                <div>
                    <div>Added From:</div>
                    <div class="fw-bold">-</div>
                </div>
                <div>
                    <div>Client Id:</div>
                    <div class="fw-bold">{{$client->client_id}}</div>
                </div>
                <div>
                    <div>Internal Id:</div>
                    <div class="fw-bold">{{$client->id}}</div>
                </div>
                <div>
                    <div>Date of Birth:</div>
                    <div class="fw-bold">{{$client->dob}}</div>
                </div>
                <div>
                    <div>Phone Number:</div>
                    <div class="fw-bold">{{$client->phone}}</div>
                </div>
                <div>
                    <div>Email:</div>
                    <div class="fw-bold">{{$client->email}}</div>
                </div>
                <div>
                    <div>Address:</div>
                    <div class="fw-bold">{{$client->street}},{{$client->city->state->country->name}}</div>
                </div>
                <div>
                    <div>Visa Expiry:</div>
                    <div class="fw-bold">{{$client->street}},{{$client->city->state->country->name}}</div>
                </div>
            </div>
        </div>
    </div>

</div>
