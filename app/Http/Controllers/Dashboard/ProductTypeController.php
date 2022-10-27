<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('productType.access');
        $productTypes = ProductType::paginate(10);
        $this->putSL($productTypes);
        return view('dashboard.productType.index', compact('productTypes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('productType.create');
        return view('dashboard.productType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('productType.store');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        ProductType::create($validated);

        return redirect()->route('productType.index')->with('success', 'ProductType Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param ProductType $productType
     * @return void
     */
    public function show(ProductType $productType)
    {
        $this->checkPermission('productType.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductType $productType
     * @return View
     */
    public function edit(ProductType $productType)
    {
        $this->checkPermission('productType.edit');
        return view('dashboard.productType.edit', compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProductType $productType
     * @return View
     */
    public function update(Request $request, ProductType $productType)
    {
        $this->checkPermission('productType.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $productType->update($validated);

        return redirect()->route('productType.index')->with('success', 'ProductType updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductType $productType
     * @return View
     */
    public function destroy(ProductType $productType)
    {
        $this->checkPermission('productType.destroy');
        $productType->delete();
        return back()->with('delete', 'ProductType deleted successfully.');
    }

    public function status(ProductType $productType): \Illuminate\Http\RedirectResponse
    {
        if ($productType->is_active==0) {
            $productType->is_active ='1';
        }
        else{
            $productType->is_active ='0';
        }

        $productType->update();

        return redirect()->route('productType.index')->with('success', 'ProductType updated successfully.');
    }

    public function search(Request $request)
    {
        $productTypes = ProductType::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('productType.productTypeTable', compact('productTypes'));
    }
}
