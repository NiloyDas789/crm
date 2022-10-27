<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\PartnerType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('partnerType.access');
        $partnerTypes = PartnerType::paginate(10);
        $this->putSL($partnerTypes);
        return view('dashboard.partnerType.index', compact('partnerTypes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('partnerType.create');
        return view('dashboard.partnerType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('partnerType.store');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        PartnerType::create($validated);

        return redirect()->route('partnerType.index')->with('success', 'PartnerType Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param PartnerType $partnerType
     * @return void
     */
    public function show(PartnerType $partnerType)
    {
        $this->checkPermission('partnerType.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PartnerType $partnerType
     * @return View
     */
    public function edit(PartnerType $partnerType)
    {
        $this->checkPermission('partnerType.edit');
        return view('dashboard.partnerType.edit', compact('partnerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PartnerType $partnerType
     * @return View
     */
    public function update(Request $request, PartnerType $partnerType)
    {
        $this->checkPermission('partnerType.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $partnerType->update($validated);

        return redirect()->route('partnerType.index')->with('success', 'PartnerType updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PartnerType $partnerType
     * @return View
     */
    public function destroy(PartnerType $partnerType)
    {
        $this->checkPermission('partnerType.destroy');
        $partnerType->delete();
        return back()->with('delete', 'PartnerType deleted successfully.');
    }

    public function status(PartnerType $partnerType): \Illuminate\Http\RedirectResponse
    {
        if ($partnerType->is_active==0) {
            $partnerType->is_active ='1';
        }
        else{
            $partnerType->is_active ='0';
        }

        $partnerType->update();

        return redirect()->route('partnerType.index')->with('success', 'PartnerType updated successfully.');
    }

    public function search(Request $request)
    {
        $partnerTypes = PartnerType::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('partnerType.partnerTypeTable', compact('partnerTypes'));
    }
}
