<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\RevenueType;
use Illuminate\Http\Request;

class RevenueTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('revenueType.access');
        $revenueTypes = RevenueType::paginate(10);
        $this->putSL($revenueTypes);
        return view('dashboard.revenueType.index', compact('revenueTypes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('revenueType.create');
        return view('dashboard.revenueType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('revenueType.store');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        RevenueType::create($validated);

        return redirect()->route('revenueType.index')->with('success', 'RevenueType Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param RevenueType $revenueType
     * @return void
     */
    public function show(RevenueType $revenueType)
    {
        $this->checkPermission('revenueType.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RevenueType $revenueType
     * @return View
     */
    public function edit(RevenueType $revenueType)
    {
        $this->checkPermission('revenueType.edit');
        return view('dashboard.revenueType.edit', compact('revenueType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param RevenueType $revenueType
     * @return View
     */
    public function update(Request $request, RevenueType $revenueType)
    {
        $this->checkPermission('revenueType.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $revenueType->update($validated);

        return redirect()->route('revenueType.index')->with('success', 'RevenueType updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RevenueType $revenueType
     * @return View
     */
    public function destroy(RevenueType $revenueType)
    {
        $this->checkPermission('revenueType.destroy');
        $revenueType->delete();
        return back()->with('delete', 'RevenueType deleted successfully.');
    }

    public function status(RevenueType $revenueType): \Illuminate\Http\RedirectResponse
    {
        if ($revenueType->is_active==0) {
            $revenueType->is_active ='1';
        }
        else{
            $revenueType->is_active ='0';
        }

        $revenueType->update();

        return redirect()->route('revenueType.index')->with('success', 'RevenueType updated successfully.');
    }

    public function search(Request $request)
    {
        $revenueTypes = RevenueType::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('revenueType.revenueTypeTable', compact('revenueTypes'));
    }
}
