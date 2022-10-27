<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Contact;
use App\Models\Dashboard\Country;
use App\Models\User\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('contact.access');
        $contacts     = Contact::paginate(10);
        $countries   = Country::pluck('name','id');
        $states   = [];

        $this->putSL($contacts);
        return view('dashboard.contact.index', compact('contacts','countries','states'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('contact.create');
        return view('dashboard.contact.create');
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
        $this->checkPermission('contact.store');

        $validated = $request->validate([
            'image'                     => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'name'                      => ['required', 'string'],
            'dob'                       => ['required', 'date'],
            'email'                     => ['required', 'string'],
            'phone'                     => ['required', 'string'],
            'street'                    => ['required', 'string'],
            'city_id'                   => ['required', 'integer'],
            'zip_code'                  => ['required', 'integer'],

        ]);

        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        Contact::create($validated);

        return redirect()->route('contact.index')->with('success', 'Contact Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return void
     */
    public function show(Contact $contact)
    {
        $this->checkPermission('contact.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return View
     */
//    public function edit(Contact $contact)
//    {
//        $this->checkPermission('contact.edit');
//        return view('dashboard.contact.edit', compact('contact'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return View
     */
    public function update(Request $request, Contact $contact)
    {
        $this->checkPermission('contact.update');
//         dd($request->all());
        $validated = $request->validate([
            'image'                     => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'name'                      => ['required', 'string'],
            'dob'                       => ['required', 'date'],
            'email'                     => ['required', 'string'],
            'phone'                     => ['required', 'string'],
            'street'                    => ['required', 'string'],
            'city_id'                   => ['required', 'integer'],
            'zip_code'                  => ['required', 'integer'],
        ]);


        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $contact->update($validated);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return View
     */
    public function destroy(Contact $contact)
    {
        $this->checkPermission('contact.destroy');
        $contact->delete();
        return back()->with('delete', 'Contact deleted successfully.');
    }

    public function status(Contact $contact): \Illuminate\Http\RedirectResponse
    {
        if ($contact->is_active==0) {
            $contact->is_active ='1';
        }
        else{
            $contact->is_active ='0';
        }

        $contact->update();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    public function search(Request $request)
    {
        $contacts = Contact::query()
            ->where('first_name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('contact.contactTable', compact('contacts'));
    }

}
