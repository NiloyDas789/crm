<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('state.access');
        $states     = State::paginate(10);
        $countries  = Country::pluck('name','id');
//        dd($countries);
        $this->putSL($states);
        return view('dashboard.state.index', compact('states','countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('state.create');
        return view('dashboard.state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('state.store');
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'country_id'    => ['required', 'integer'],

        ]);

        State::create($validated);

        return redirect()->route('state.index')->with('success', 'State Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param State $state
     * @return void
     */
    public function show(State $state)
    {
        $this->checkPermission('state.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param State $state
     * @return View
     */
//    public function edit(State $state)
//    {
//        $this->checkPermission('state.edit');
//        return view('dashboard.state.edit', compact('state'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param State $state
     * @return View
     */
    public function update(Request $request, State $state)
    {
        $this->checkPermission('state.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'country_id'    => ['required', 'integer'],

        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $state->update($validated);

        return redirect()->route('state.index')->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return View
     */
    public function destroy(State $state)
    {
        $this->checkPermission('state.destroy');
        $state->delete();
        return back()->with('delete', 'State deleted successfully.');
    }

    public function status(State $state): \Illuminate\Http\RedirectResponse
    {
        if ($state->is_active==0) {
            $state->is_active ='1';
        }
        else{
            $state->is_active ='0';
        }

        $state->update();

        return redirect()->route('state.index')->with('success', 'State updated successfully.');
    }

    public function search(Request $request)
    {
        $states = State::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('state.stateTable', compact('states'));
    }
}
