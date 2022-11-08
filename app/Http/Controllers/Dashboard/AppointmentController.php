<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Appointment;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\TimeZone;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('appointment.access');
        $appointments = Appointment::paginate(10);
        $countries = Country::pluck('name','id');
        $clients = Client::pluck('client_id','id');
        $partners = Partner::pluck('name','id');
        $timezone = TimeZone::pluck('name','id');
        $this->putSL($appointments);
        return view('dashboard.appointment.index', compact('appointments','countries', 'clients','timezone','partners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('appointment.create');
        return view('dashboard.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('appointment.store');
        $validated = $request->validate([
            'related_id'        => ['integer'],
            'user_id'           => ['integer'],
            'client_id'         => ['integer'],
            'partner_id'         => ['integer'],
            'time_zone_id'       => ['string'],
            'date'              => ['date'],
            'time'              => ['string'],
            'title'             => ['required', 'string', 'max:255'],
            'description'       => ['string','nullable'],
            'invitees_id'       => ['integer'],
        ]);
        $validated['user_id'] = auth()->id();
        $validated['invitees_id'] = 0;


        Appointment::create($validated);

        return redirect()->route('appointment.index')->with('success', 'Appointment Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return void
     */
    public function show(Appointment $appointment)
    {
        $this->checkPermission('appointment.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return View
     */
    public function edit(Appointment $appointment)
    {
        $this->checkPermission('appointment.edit');
        return view('dashboard.appointment.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Appointment $appointment
     * @return View
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->checkPermission('appointment.update');
        // dd($request->all());
        $validated = $request->validate([
            'related_id'        => ['integer'],
            'user_id'           => ['integer'],
            'client_id'         => ['integer'],
            'timezone_id'       => ['string'],
            'date'              => ['date'],
            'time'              => ['string'],
            'title'             => ['required', 'string', 'max:255'],
            'description'       => ['string','nullable'],
            'invitees_id'       => ['integer'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $appointment->update($validated);

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return View
     */
    public function destroy(Appointment $appointment)
    {
        $this->checkPermission('appointment.destroy');
        $appointment->delete();
        return back()->with('delete', 'Appointment deleted successfully.');
    }

    public function status(Appointment $appointment): \Illuminate\Http\RedirectResponse
    {
        if ($appointment->is_active==0) {
            $appointment->is_active ='1';
        }
        else{
            $appointment->is_active ='0';
        }

        $appointment->update();

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully.');
    }

    public function search(Request $request)
    {
        $appointments = Appointment::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('appointment.appointmentTable', compact('appointments'));
    }
}
