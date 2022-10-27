<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Branch;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Currency;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\PartnerType;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('partner.access');
        $partners              = Partner::paginate(10);
        $countries             = Country::pluck('name','id');
        $categories            = Category::pluck('name','id');
        $partnerTypes           = PartnerType::pluck('name','id');
        $serviceWorkflows      = ['serviceWorkflows','serviceWorkflows1','serviceWorkflows2','serviceWorkflows3','serviceWorkflows4',];
        $currencies            = Currency::pluck('name','id');
        $branches              = Branch::pluck('name','id');

        $this->putSL($partners);
        return view('dashboard.partner.index', compact('partners','countries','categories','partnerTypes','serviceWorkflows','currencies','branches'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('partner.create');
        return view('dashboard.partner.create');
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
        $this->checkPermission('partner.store');

        $validated = $request->validate([
            'image'                             => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'name'                              => ['required', 'string'],
            'master_category_id'                => ['required', 'integer'],
            'partner_type_id'                   => ['required', 'integer'],
            'business_registration_number'      => ['required', 'string'],
            'service_workflow_id'               => ['required', 'integer'],
            'currency_id'                       => ['required', 'integer'],
            'street'                            => ['required', 'string'],
            'zip_code'                          => ['required', 'string'],
            'city_id'                           => ['required', 'integer'],
            'phone'                             => ['required', 'string'],
            'email'                             => ['required', 'string'],
            'fax'                               => ['required', 'string'],
            'website'                           => ['required', 'string'],
            'branch_id'                         => ['required', 'integer'],

        ]);

        do {
            $partner_id = "cl-".random_int(100000, 999999);
        } while (Partner::where("partner_id", "=", $partner_id)->first());

        $validated['partner_id']=  $partner_id;

        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        Partner::create($validated);

        return redirect()->route('partner.index')->with('success', 'Partner Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Partner $partner
     * @return void
     */
    public function show(Partner $partner)
    {
        $this->checkPermission('partner.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return View
     */
//    public function edit(Partner $partner)
//    {
//        $this->checkPermission('partner.edit');
//        return view('dashboard.partner.edit', compact('partner'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Partner $partner
     * @return View
     */
    public function update(Request $request, Partner $partner)
    {
        $this->checkPermission('partner.update');
//         dd($request->all());
        $validated = $request->validate([
            'image'                             => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:1024'],
            'name'                              => ['required', 'string'],
            'master_category_id'                => ['required', 'integer'],
            'partner_type_id'                   => ['required', 'integer'],
            'business_registration_number'      => ['required', 'string'],
            'service_workflow_id'               => ['required', 'integer'],
            'currency_id'                       => ['required', 'integer'],
            'street'                            => ['required', 'string'],
            'zip_code'                          => ['required', 'string'],
            'city_id'                           => ['required', 'integer'],
            'phone'                             => ['required', 'string'],
            'email'                             => ['required', 'string'],
            'fax'                               => ['required', 'string'],
            'website'                           => ['required', 'string'],
            'branch_id'                         => ['required', 'integer'],
        ]);


        $validated['image'] = uploadFile($request->file('image'), 'agent/image');


        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $partner->update($validated);

        return redirect()->route('partner.index')->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return View
     */
    public function destroy(Partner $partner)
    {
        $this->checkPermission('partner.destroy');
        $partner->delete();
        return back()->with('delete', 'Partner deleted successfully.');
    }

    public function status(Partner $partner): \Illuminate\Http\RedirectResponse
    {
        if ($partner->is_active==0) {
            $partner->is_active ='1';
        }
        else{
            $partner->is_active ='0';
        }

        $partner->update();

        return redirect()->route('partner.index')->with('success', 'Partner updated successfully.');
    }

    public function search(Request $request)
    {
        $partners = Partner::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('partner.partnerTable', compact('partners'));
    }

}
