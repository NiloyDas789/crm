<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Contact;
use App\Models\Dashboard\OfficeCheckin;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfficeCheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('officeCheckin.access');
        $officeCheckins = OfficeCheckin::paginate(10);
        $contacts       = Contact::pluck('name','id');
        $assignees      = User::pluck('name','id');
        $this->putSL($officeCheckins);
        return view('dashboard.officeCheckin.index', compact('officeCheckins','assignees','contacts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('officeCheckin.create');
        return view('dashboard.officeCheckin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('officeCheckin.store');
        $validated = $request->validate([
            'date'              => ['date','required'],
            'start'             => ['date_format:H:i','required'],
            'wait_time'         => ['date_format:H:i','required'],
            'contact_id'        => ['required', 'integer'],
            'visit_purpose'     => ['string','nullable'],
            'status'            => ['integer','nullable'],
        ]);
        $validated['assignee_id'] = auth()->user()->id;

        OfficeCheckin::create($validated);

        return redirect()->route('officeCheckin.index')->with('success', 'OfficeCheckin Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param OfficeCheckin $officeCheckin
     * @return void
     */
    public function show(OfficeCheckin $officeCheckin)
    {
        $this->checkPermission('officeCheckin.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OfficeCheckin $officeCheckin
     * @return View
     */
    public function edit(OfficeCheckin $officeCheckin)
    {
        $this->checkPermission('officeCheckin.edit');
        return view('dashboard.officeCheckin.edit', compact('officeCheckin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OfficeCheckin $officeCheckin
     * @return View
     */
    public function update(Request $request, OfficeCheckin $officeCheckin)
    {
        $this->checkPermission('officeCheckin.update');
        // dd($request->all());
        $validated = $request->validate([
            'date'              => ['date','required'],
            'start'             => ['date_format:H:i','required'],
            'wait_time'         => ['date_format:H:i','required'],
            'contact_id'        => ['required', 'integer'],
            'visit_purpose'     => ['string','nullable'],
            'status'            => ['integer','nullable'],
        ]);
        $validated['assignee_id'] = auth()->user()->id;

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $officeCheckin->update($validated);

        return redirect()->route('officeCheckin.index')->with('success', 'OfficeCheckin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OfficeCheckin $officeCheckin
     * @return View
     */
    public function destroy(OfficeCheckin $officeCheckin)
    {
        $this->checkPermission('officeCheckin.destroy');
        $officeCheckin->delete();
        return back()->with('delete', 'OfficeCheckin deleted successfully.');
    }

    public function status(OfficeCheckin $officeCheckin): \Illuminate\Http\RedirectResponse
    {
        if ($officeCheckin->is_active==0) {
            $officeCheckin->is_active ='1';
        }
        else{
            $officeCheckin->is_active ='0';
        }

        $officeCheckin->update();

        return redirect()->route('officeCheckin.index')->with('success', 'OfficeCheckin updated successfully.');
    }

    public function search(Request $request)
    {
        $officeCheckins = OfficeCheckin::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('officeCheckin.officeCheckinTable', compact('officeCheckins'));
    }
}
