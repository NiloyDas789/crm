<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Enqury;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnquryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('enqury.access');
        $enquries = Enqury::paginate(10);
        $this->putSL($enquries);
        return view('dashboard.enqury.index', compact('enquries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('enqury.create');
        return view('dashboard.enqury.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('enqury.store');
        $validated = $request->validate([
            'name'                      => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string'],
            'mobile'                    => ['required', 'string'],
            'higher_level_education'    => ['required', 'string'],
            'comment'                   => ['required', 'string'],

        ]);

        Enqury::create($validated);

        return redirect()->route('enqury.index')->with('success', 'Enqury Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Enqury $enqury
     * @return void
     */
    public function show(Enqury $enqury)
    {
        $this->checkPermission('enqury.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Enqury $enqury
     * @return View
     */
    public function edit(Enqury $enqury)
    {
        $this->checkPermission('enqury.edit');
        return view('dashboard.enqury.edit', compact('enqury'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Enqury $enqury
     * @return View
     */
    public function update(Request $request, Enqury $enqury)
    {
        $this->checkPermission('enqury.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'                      => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string'],
            'mobile'                    => ['required', 'string'],
            'higher_level_education'    => ['required', 'string'],
            'comment'                   => ['required', 'string'],

        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $enqury->update($validated);

        return redirect()->route('enqury.index')->with('success', 'Enqury updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Enqury $enqury
     * @return View
     */
    public function destroy(Enqury $enqury)
    {
        $this->checkPermission('enqury.destroy');
        $enqury->delete();
        return back()->with('delete', 'Enqury deleted successfully.');
    }

    public function status(Enqury $enqury): \Illuminate\Http\RedirectResponse
    {
        if ($enqury->is_active==0) {
            $enqury->is_active ='1';
        }
        else{
            $enqury->is_active ='0';
        }

        $enqury->update();

        return redirect()->route('enqury.index')->with('success', 'Enqury updated successfully.');
    }

    public function search(Request $request)
    {
        $enquries = Enqury::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('enqury.enquryTable', compact('enquries'));
    }
}
