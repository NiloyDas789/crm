<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Branch;
use App\Models\Dashboard\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('branch.access');
        $branches = Branch::paginate(10);
        $countries   = Country::pluck('name','id');

        $this->putSL($branches);
        return view('dashboard.branch.index', compact('branches','countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('branch.create');
        return view('dashboard.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('branch.store');
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'phone'                 => ['string','required'],
            'email'                 => ['string','nullable'],
            'street'                => ['string','required'],
            'city_id'               => ['integer','required']
        ]);


        Branch::create($validated);

        return redirect()->route('branch.index')->with('success', 'Branch Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @return void
     */
    public function show(Branch $branch)
    {
        $this->checkPermission('branch.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return View
     */
    public function edit(Branch $branch)
    {
        $this->checkPermission('branch.edit');
        return view('dashboard.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Branch $branch
     * @return View
     */
    public function update(Request $request, Branch $branch)
    {
        $this->checkPermission('branch.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'phone'                 => ['string','required'],
            'email'                 => ['string','nullable'],
            'street'                => ['string','required'],
            'city_id'               => ['integer','required']
        ]);


        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $branch->update($validated);

        return redirect()->route('branch.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return View
     */
    public function destroy(Branch $branch)
    {
        $this->checkPermission('branch.destroy');
        $branch->delete();
        return back()->with('delete', 'Branch deleted successfully.');
    }

    public function status(Branch $branch): \Illuminate\Http\RedirectResponse
    {
        if ($branch->is_active==0) {
            $branch->is_active ='1';
        }
        else{
            $branch->is_active ='0';
        }

        $branch->update();

        return redirect()->route('branch.index')->with('success', 'Branch updated successfully.');
    }

    public function search(Request $request)
    {
        $branches = Branch::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('branch.branchTable', compact('branches'));
    }
}
