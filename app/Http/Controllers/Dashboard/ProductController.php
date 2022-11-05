<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Branch;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\ProductType;
use App\Models\Dashboard\RevenueType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('product.access');
        $products          = Product::paginate(10);
        $partners          = Partner::pluck('name','id');
        $branches          = Branch::pluck('name','id');
        $productTypes      = ProductType::pluck('name','id');
        $revenueTypes      = RevenueType::pluck('name','id');
        $this->putSL($products);
        return view('dashboard.product.index', compact('products','partners','branches','productTypes','revenueTypes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('product.create');
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // $this->checkPermission('product.store');
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'partner_id'            => ['integer','nullable'],
            'branch_id'             => ['integer','nullable'],
            'product_type_id'       => ['integer','nullable'],
            'revenue_type_id'       => ['integer','nullable'],
            'duration'              => ['string'],
            'intake_month_id'       => ['integer'],
            'description'           => ['string','nullable'],
            'note'                  => ['string','nullable'],
        ]);

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function show(Product $product)
    {
        $this->checkPermission('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        $this->checkPermission('product.edit');
        return view('dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return View
     */
    public function update(Request $request, Product $product)
    {
        $this->checkPermission('product.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'partner_id'            => ['integer','nullable'],
            'branch_id'             => ['integer','nullable'],
            'product_type_id'       => ['integer','nullable'],
            'revenue_type_id'       => ['integer','nullable'],
            'duration'              => ['string'],
            'intake_month_id'       => ['integer'],
            'description'           => ['string','nullable'],
            'note'                  => ['string','nullable'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return View
     */
    public function destroy(Product $product)
    {
        $this->checkPermission('product.destroy');
        $product->delete();
        return back()->with('delete', 'Product deleted successfully.');
    }

    public function status(Product $product): \Illuminate\Http\RedirectResponse
    {
        if ($product->is_active==0) {
            $product->is_active ='1';
        }
        else{
            $product->is_active ='0';
        }

        $product->update();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function search(Request $request)
    {
        $products = Product::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('product.productTable', compact('products'));
    }
}
