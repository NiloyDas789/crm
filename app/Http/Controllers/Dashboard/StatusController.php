<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Models\Dashboard\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('status.access');
        $statuses = Status::paginate(10);
        $this->putSL($statuses);
        return view('dashboard.status.index', compact('statuses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('status.create');
        return view('dashboard.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('status.store');
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['string','nullable'],
            'is_active'     => ['boolean'],
        ]);

        Status::create($validated);

        return redirect()->route('status.index')->with('success', 'Status Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @return void
     */
    public function show(Status $status)
    {
        $this->checkPermission('status.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @return View
     */
    public function edit(Status $status)
    {
        $this->checkPermission('status.edit');
        return view('dashboard.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return View
     */
    public function update(Request $request, Status $status)
    {
        $this->checkPermission('status.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'          => ['required', 'string','max:255'],
            'description'   => ['string','nullable'],
            'is_active'     => ['boolean'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $status->update($validated);

        return redirect()->route('status.index')->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return View
     */
    public function destroy(Status $status)
    {
        $this->checkPermission('status.destroy');
        $status->delete();
        return back()->with('delete', 'Status deleted successfully.');
    }

    public function status(Status $status): \Illuminate\Http\RedirectResponse
    {
        if ($status->is_active==0) {
            $status->is_active ='1';
        }
        else{
            $status->is_active ='0';
        }

        $status->update();

        return redirect()->route('status.index')->with('success', 'Status updated successfully.');
    }

    public function search(Request $request)
    {
        $statuses = Status::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('status.statusTable', compact('statuses'));
    }
}
