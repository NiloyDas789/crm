<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\City;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('city.access');
        $cities     = City::paginate(10);
        $countries  = Country::pluck('name','id');
        $this->putSL($cities);
        return view('dashboard.city.index', compact('cities','countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
//    public function create()
//    {
//        $this->checkPermission('city.create');
//        return view('dashboard.city.create');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('city.store');
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'state_id'      => ['required', 'integer'],

        ]);

        City::create($validated);

        return redirect()->route('city.index')->with('success', 'City Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return void
     */
    public function show(City $city)
    {
        $this->checkPermission('city.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return View
     */
//    public function edit(City $city)
//    {
//        $this->checkPermission('city.edit');
//        return view('dashboard.city.edit', compact('city'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param City $city
     * @return View
     */
    public function update(Request $request, City $city)
    {
        $this->checkPermission('city.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'state_id'      => ['required', 'integer'],

        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $city->update($validated);

        return redirect()->route('city.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return View
     */
    public function destroy(City $city)
    {
        $this->checkPermission('city.destroy');
        $city->delete();
        return back()->with('delete', 'City deleted successfully.');
    }

    public function status(City $city): \Illuminate\Http\RedirectResponse
    {
        if ($city->is_active==0) {
            $city->is_active ='1';
        }
        else{
            $city->is_active ='0';
        }

        $city->update();

        return redirect()->route('city.index')->with('success', 'City updated successfully.');
    }

    public function search(Request $request)
    {
        $cities = City::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('city.cityTable', compact('cities'));
    }
}
