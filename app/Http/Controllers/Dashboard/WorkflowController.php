<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Task;
use App\Models\Dashboard\Workflow;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('workflow.access');
        // dd('adsfasd');
        $workflows = Workflow::paginate(10);
        // dd($workflows);
        $tasks = Task::pluck('title', 'id');
        $this->putSL($workflows);
        return view('dashboard.workflow.index', compact('workflows', 'tasks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('workflow.create');
        return view('dashboard.workflow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('workflow.store');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'task_id'     => ['required', 'array'],
        ]);
        // dd($validated['task_id']);



        $workflow = Workflow::create($validated);
        $workflow->tasks()->attach($validated['task_id']);

        return redirect()->route('workflow.index')->with('success', 'Workflow Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Workflow $workflow
     * @return void
     */
    public function show(Workflow $workflow)
    {
        $this->checkPermission('workflow.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Workflow $workflow
     * @return View
     */
    public function edit(Workflow $workflow)
    {
        $this->checkPermission('workflow.edit');
        return view('dashboard.workflow.edit', compact('workflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Workflow $workflow
     * @return View
     */
    public function update(Request $request, Workflow $workflow)
    {
        $this->checkPermission('workflow.update');
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $workflow->update($validated);

        return redirect()->route('workflow.index')->with('success', 'Workflow updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Workflow $workflow
     * @return View
     */
    public function destroy(Workflow $workflow)
    {
        $this->checkPermission('workflow.destroy');
        $workflow->delete();
        return back()->with('delete', 'Workflow deleted successfully.');
    }

    public function status(Workflow $workflow): \Illuminate\Http\RedirectResponse
    {
        if ($workflow->is_active==0) {
            $workflow->is_active ='1';
        } else {
            $workflow->is_active ='0';
        }

        $workflow->update();

        return redirect()->route('workflow.index')->with('success', 'Workflow updated successfully.');
    }

    public function search(Request $request)
    {
        $workflows = Workflow::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('workflow.workflowTable', compact('workflows'));
    }
}
