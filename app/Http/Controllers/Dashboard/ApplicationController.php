<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Application;
use App\Models\Dashboard\Branch;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Office;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Workflow;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index($id)
    {
        $this->checkPermission('application.access');
        $client         = Client::findOrFail($id)->with('applications','applications.product','city.state.country')->first();
//        dd($client->first_name);
        $workflows     = Workflow::pluck('name','id');
        $partners     = Partner::pluck('name','id');
        $branches     = Branch::pluck('name','id');
        $products     = Product::pluck('name','id');
//        $this->putSL($client->applications);
        return view('dashboard.application.index', compact('client','workflows','partners','branches','products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('application.create');
        return view('dashboard.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('application.store');
        $validated = $request->validate([
            'client_id'             => [ 'integer','required'],
            'workflow_id'           => [ 'integer','nullable'],
            'partner_id'            => [ 'integer','nullable'],
            'branch_id'             => [ 'integer','nullable'],
            'product_id'             => [ 'integer','required'],
            'started_at'            => [ 'date','nullable'],
            'ended_at'              => [ 'date','nullable'],
            'applied_intake'        => [ 'date','nullable'],
            'note_title'            => [ 'string','nullable'],
            'note_description'      => [ 'string','nullable'],
            'assignee_id'           => [ 'integer','nullable'],
            'application_form_id'   => [ 'integer','nullable'],
        ]);

        $validated['assignee_id'] = auth()->user()->id;
        $validated['image'] = uploadFile($request->file('image'), 'application/image');

        Application::create($validated);

        return redirect()->back()->with('success', 'Application Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return void
     */
//    public function show(Client $client)
//    {
//        $this->checkPermission('application.index');
//        return view('dashboard.application.show', compact('client'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @return View
     */
    public function edit(Application $application)
    {
        $this->checkPermission('application.edit');
        $client         = Client::findOrFail($application->client->id)->with('applications','applications.product','city.state.country')->first();
        return view('dashboard.application.edit', compact('application','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Application $application
     * @return View
     */
    public function update(Request $request, Application $application)
    {
        $this->checkPermission('application.update');
        // dd($request->all());
        $validated = $request->validate([
            'client_id'             => [ 'integer','required'],
            'workflow_id'           => [ 'integer','nullable'],
            'partner_id'            => [ 'integer','nullable'],
            'branch_id'             => [ 'integer','nullable'],
            'product_id'             => [ 'integer','required'],
            'started_at'            => [ 'date','nullable'],
            'ended_at'              => [ 'date','nullable'],
            'applied_intake'        => [ 'date','nullable'],
            'note_title'            => [ 'string','nullable'],
            'note_description'      => [ 'string','nullable'],
            'assignee_id'           => [ 'integer','nullable'],
            'application_form_id'   => [ 'integer','nullable'],
        ]);

        $validated['image'] = uploadFile($request->file('image'), 'application/image');

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $application->update($validated);

        return redirect()-back()->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return View
     */
    public function destroy(Application $application)
    {
        $this->checkPermission('application.destroy');
        $application->delete();
        return back()->with('delete', 'Application deleted successfully.');
    }

    public function status(Application $application): \Illuminate\Http\RedirectResponse
    {
        if ($application->is_active==0) {
            $application->is_active ='1';
        }
        else{
            $application->is_active ='0';
        }

        $application->update();

        return redirect()->route('application.index')->with('success', 'Application updated successfully.');
    }

    public function search(Request $request)
    {
        $applications = Application::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('application.applicationTable', compact('applications'));
    }
}
