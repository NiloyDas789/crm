<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Office;
use App\Models\Dashboard\City;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\State;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('office.access');
        $offices        = Office::paginate(10);
        $countries      = Country::pluck('name','id');
        $contactPersons =User::pluck('name','id');

        $this->putSL($offices);
        return view('dashboard.office.index', compact('offices','countries','contactPersons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('office.create');
        return view('dashboard.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->checkPermission('office.store');
        $validated = $request->validate([
            'name'                  => ['string','nullable'],
            'street'                => ['string','nullable'],
            'city_id'               => ['integer','nullable'],
            'zip_code'              => ['integer','nullable'],
            'email'                 => ['string','nullable'],
            'phone'                 => ['string','nullable'],
            'mobile'                => ['string','nullable'],
            'contact_person_id'     => ['integer','nullable'],
        ]);

        $validated['admin_id']= Auth::user()->id;


        Office::create($validated);

        return redirect()->route('office.index')->with('success', 'Office Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Office $office
     * @return void
     */
    public function show(Office $office)
    {
        $this->checkPermission('office.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Office $office
     * @return View
     */
    public function edit(Office $office)
    {
        $this->checkPermission('office.edit');
        return view('dashboard.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Office $office
     * @return View
     */
    public function update(Request $request, Office $office)
    {
        $this->checkPermission('office.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'                  => ['string','nullable'],
            'street'                => ['string','nullable'],
            'city_id'               => ['integer','nullable'],
            'zip_code'              => ['integer','nullable'],
            'email'                 => ['string','nullable'],
            'phone'                 => ['string','nullable'],
            'mobile'                => ['string','nullable'],
            'contact_person_id'     => ['integer','nullable'],
        ]);

        $validated['admin_id']= Auth::user()->id;

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $office->update($validated);

        return redirect()->route('office.index')->with('success', 'Office updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Office $office
     * @return View
     */
    public function destroy(Office $office)
    {
        $this->checkPermission('office.destroy');
        $office->delete();
        return back()->with('delete', 'Office deleted successfully.');
    }

    public function status(Office $office): \Illuminate\Http\RedirectResponse
    {
        if ($office->is_active==0) {
            $office->is_active ='1';
        }
        else{
            $office->is_active ='0';
        }

        $office->update();

        return redirect()->route('office.index')->with('success', 'Office updated successfully.');
    }

    public function search(Request $request)
    {
        $offices = Office::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('office.officeTable', compact('offices'));
    }
}
