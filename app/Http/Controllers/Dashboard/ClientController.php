<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\City;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\State;
use App\Models\User\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('client.access');
        $clients     = Client::paginate(10);
        $countries   = Country::pluck('name','id');
        $assignees   = User::pluck('name','id');

        $this->putSL($clients);
        return view('dashboard.client.index', compact('clients','assignees','countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('client.create');
        return view('dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        $this->checkPermission('client.store');

        $validated = $request->validate([
            'image'                     => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'first_name'                => ['required', 'string'],
            'last_name'                 => ['required', 'string'],
            'dob'                       => ['required', 'date'],
            'email'                     => ['required', 'string'],
            'phone'                     => ['required', 'string'],
            'contact_reference'         => ['nullable', 'string'],
            'street'                    => ['nullable', 'string'],
            'city_id'                   => ['nullable', 'integer'],
            'zip_code'                  => ['nullable', 'integer'],
            'visa_expiry_date'          => ['nullable', 'string'],
            'application'               => ['nullable', 'string'],
            'assignee_id'               => ['nullable', 'integer'],
            'followers'                 => ['nullable', 'string'],
            'source'                    => ['nullable', 'string'],
            'tag_name'                  => ['nullable', 'string'],
            'rating'                    => ['nullable', 'integer','min:0','max:5'],

        ]);

        do {
            $client_id = "cl-".random_int(100000, 999999);
        } while (Client::where("client_id", "=", $client_id)->first());

        $validated['client_id']=  $client_id;

        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        Client::create($validated);

        return redirect()->route('client.index')->with('success', 'Client Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return void
     */
    public function show(Client $client)
    {
        $this->checkPermission('client.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return View
     */
//    public function edit(Client $client)
//    {
//        $this->checkPermission('client.edit');
//        return view('dashboard.client.edit', compact('client'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return View
     */
    public function update(Request $request, Client $client)
    {
        $this->checkPermission('client.update');
//         dd($request->all());
        $validated = $request->validate([
            'image'                     => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'first_name'                => ['required', 'string'],
            'last_name'                 => ['required', 'string'],
            'dob'                       => ['required', 'date'],
            'email'                     => ['required', 'string'],
            'phone'                     => ['required', 'string'],
            'contact_reference'         => ['nullable', 'string'],
            'street'                    => ['nullable', 'string'],
            'city_id'                   => ['nullable', 'integer'],
            'zip_code'                  => ['nullable', 'integer'],
            'visa_expiry_date'          => ['nullable', 'string'],
            'application'               => ['nullable', 'string'],
            'assignee_id'               => ['nullable', 'integer'],
            'followers'                 => ['nullable', 'string'],
            'source'                    => ['nullable', 'string'],
            'tag_name'                  => ['nullable', 'string'],
            'rating'                    => ['nullable', 'integer'],
        ]);


        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $client->update($validated);

        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return View
     */
    public function destroy(Client $client)
    {
        $this->checkPermission('client.destroy');
        $client->delete();
        return back()->with('delete', 'Client deleted successfully.');
    }

    public function status(Client $client): \Illuminate\Http\RedirectResponse
    {
        if ($client->is_active==0) {
            $client->is_active ='1';
        }
        else{
            $client->is_active ='0';
        }

        $client->update();

        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }

    public function search(Request $request)
    {
        $clients = Client::query()
            ->where('first_name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('client.clientTable', compact('clients'));
    }

}
