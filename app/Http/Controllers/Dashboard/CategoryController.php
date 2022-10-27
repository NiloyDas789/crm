<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('category.access');
        $categories = Category::paginate(10);
        $this->putSL($categories);
        return view('dashboard.category.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('category.create');
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('category.store');
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function show(Category $category)
    {
        $this->checkPermission('category.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        $this->checkPermission('category.edit');
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return View
     */
    public function update(Request $request, Category $category)
    {
        $this->checkPermission('category.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'          => ['required', 'string','max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return View
     */
    public function destroy(Category $category)
    {
        $this->checkPermission('category.destroy');
        $category->delete();
        return back()->with('delete', 'Category deleted successfully.');
    }

    public function status(Category $category): \Illuminate\Http\RedirectResponse
    {
        if ($category->is_active==0) {
            $category->is_active ='1';
        }
        else{
            $category->is_active ='0';
        }

        $category->update();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function search(Request $request)
    {
        $categories = Category::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('category.categoryTable', compact('categories'));
    }
}
