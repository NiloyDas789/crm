<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\WorkflowStage;
use Illuminate\Http\Request;

class WorkflowStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('workflowStage.access');
        $workflowStages = WorkflowStage::paginate(10);
        $this->putSL($workflowStages);
        return view('dashboard.workflowStage.index', compact('workflowStages'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('workflowStage.create');
        return view('dashboard.workflowStage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('workflowStage.store');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        WorkflowStage::create($validated);

        return redirect()->route('workflowStage.index')->with('success', 'WorkflowStage Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param WorkflowStage $workflowStage
     * @return void
     */
    public function show(WorkflowStage $workflowStage)
    {
        $this->checkPermission('workflowStage.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkflowStage $workflowStage
     * @return View
     */
    public function edit(WorkflowStage $workflowStage)
    {
        $this->checkPermission('workflowStage.edit');
        return view('dashboard.workflowStage.edit', compact('workflowStage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WorkflowStage $workflowStage
     * @return View
     */
    public function update(Request $request, WorkflowStage $workflowStage)
    {
        $this->checkPermission('workflowStage.update');
        // dd($request->all());
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $workflowStage->update($validated);

        return redirect()->route('workflowStage.index')->with('success', 'WorkflowStage updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WorkflowStage $workflowStage
     * @return View
     */
    public function destroy(WorkflowStage $workflowStage)
    {
        $this->checkPermission('workflowStage.destroy');
        $workflowStage->delete();
        return back()->with('delete', 'WorkflowStage deleted successfully.');
    }

    public function status(WorkflowStage $workflowStage): \Illuminate\Http\RedirectResponse
    {
        if ($workflowStage->is_active==0) {
            $workflowStage->is_active ='1';
        }
        else{
            $workflowStage->is_active ='0';
        }

        $workflowStage->update();

        return redirect()->route('workflowStage.index')->with('success', 'WorkflowStage updated successfully.');
    }

    public function search(Request $request)
    {
        $workflowStages = WorkflowStage::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('workflowStage.workflowStageTable', compact('workflowStages'));
    }
}
