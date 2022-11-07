<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Agent;
use App\Models\Dashboard\City;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Office;
use App\Models\Dashboard\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('agent.access');
        $agents      = Agent::paginate(10);
        $offices     = Office::pluck('name','id');
        $countries   = Country::pluck('name','id');

        $this->putSL($agents);
        return view('dashboard.agent.index', compact('agents','countries','offices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('agent.create');
        return view('dashboard.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('agent.store');
        $validated = $request->validate([
            'image'                 => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
            'name'                  => ['required', 'string', 'max:255'],
            'agent_type'            => ['string','nullable'],
            'agent_structure'       => ['string','nullable'],
            'phone'                 => ['string','nullable'],
            'email'                 => ['string','nullable'],
            'street'                => ['string','nullable'],
            'city_id'               => ['integer','nullable'],
            'office_id'             => ['integer','nullable'],
        ]);

        $validated['image'] = $request->file('image') ? uploadFile($request->file('image'), 'agent/image') : 'default.png';


        Agent::create($validated);

        return redirect()->route('agent.index')->with('success', 'Agent Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Agent $agent
     * @return void
     */
    public function show(Agent $agent)
    {
        $this->checkPermission('agent.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Agent $agent
     * @return View
     */
    public function edit(Agent $agent)
    {
        $this->checkPermission('agent.edit');
        return view('dashboard.agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Agent $agent
     * @return View
     */
    public function update(Request $request, Agent $agent)
    {
        $this->checkPermission('agent.update');
        // dd($request->all());
        $validated = $request->validate([
            'image'                 => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
            'name'                  => ['required', 'string', 'max:255'],
            'agent_type'            => ['string','nullable'],
            'agent_structure'       => ['string','nullable'],
            'phone'                 => ['string','nullable'],
            'email'                 => ['string','nullable'],
            'street'                => ['string','nullable'],
            'city_id'               => ['integer','nullable'],
            'office_id'             => ['integer','nullable'],
        ]);

        $validated['image'] = uploadFile($request->file('image'), 'agent/image');

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $agent->update($validated);

        return redirect()->route('agent.index')->with('success', 'Agent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Agent $agent
     * @return View
     */
    public function destroy(Agent $agent)
    {
        $this->checkPermission('agent.destroy');
        $agent->delete();
        return back()->with('delete', 'Agent deleted successfully.');
    }

    public function status(Agent $agent): \Illuminate\Http\RedirectResponse
    {
        if ($agent->is_active==0) {
            $agent->is_active ='1';
        }
        else{
            $agent->is_active ='0';
        }

        $agent->update();

        return redirect()->route('agent.index')->with('success', 'Agent updated successfully.');
    }

    public function search(Request $request)
    {
        $agents = Agent::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('agent.agentTable', compact('agents'));
    }
}
