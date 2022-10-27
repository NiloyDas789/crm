<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('country.access');
        $countries = Country::paginate(10);
        $this->putSL($countries);
        return view('dashboard.country.index', compact('countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('country.create');
        return view('dashboard.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('country.store');
        $validated = $request->validate([
            'code'       => ['required', 'string'],
            'name'       => ['required', 'string', 'max:255'],
            'phonecode'  => ['required', 'integer'],

        ]);

        Country::create($validated);

        return redirect()->route('country.index')->with('success', 'Country Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return void
     */
    public function show(Country $country)
    {
        $this->checkPermission('country.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return View
     */
    public function edit(Country $country)
    {
        $this->checkPermission('country.edit');
        return view('dashboard.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Country $country
     * @return View
     */
    public function update(Request $request, Country $country)
    {
        $this->checkPermission('country.update');
        // dd($request->all());
        $validated = $request->validate([
            'code'       => ['required', 'string'],
            'name'       => ['required', 'string', 'max:255'],
            'phonecode'  => ['required', 'integer'],

        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $country->update($validated);

        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return View
     */
    public function destroy(Country $country)
    {
        $this->checkPermission('country.destroy');
        $country->delete();
        return back()->with('delete', 'Country deleted successfully.');
    }

    public function status(Country $country): \Illuminate\Http\RedirectResponse
    {
        if ($country->is_active==0) {
            $country->is_active ='1';
        }
        else{
            $country->is_active ='0';
        }

        $country->update();

        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    public function search(Request $request)
    {
        $countries = Country::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('country.countryTable', compact('countries'));
    }
}
