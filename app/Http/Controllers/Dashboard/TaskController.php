<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Office;
use App\Models\Dashboard\Priority;
use App\Models\Dashboard\Task;
use App\Models\User\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->checkPermission('task.access');
        $tasks = Task::paginate(10);
        $categories = Category::pluck('name', 'id');
        $assignees = User::pluck('name', 'id');
        $priorities = Priority::pluck('name', 'id');
        $offices = Office::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $this->putSL($tasks);
        return view('dashboard.task.index', compact('tasks', 'categories', 'assignees', 'priorities', 'offices', 'countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('task.create');
        return view('dashboard.task.create');
    }

    /**
     * Store a newly created resource in storage.foreach
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('task.store');
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'category'          => ['string','nullable'],
            'assignee_id'       => ['integer','nullable'],
            'application_id'    => ['integer','nullable'],
            'priority'          => ['string'],
            'due_date'          => ['date'],
            'due_time'          => ['string'],
        ]);

        Task::create($validated);

        return redirect()->route('task.index')->with('success', 'Task Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return void
     */
    public function show(Task $task)
    {
        $this->checkPermission('task.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return View
     */
    public function edit(Task $task)
    {
        $this->checkPermission('task.edit');
        return view('dashboard.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return View
     */
    public function update(Request $request, Task $task)
    {
        $this->checkPermission('task.update');
        // dd($request->all());
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'category'          => ['string','nullable'],
            'assignee_id'       => ['integer','nullable'],
            'application_id'    => ['integer','nullable'],
            'priority'          => ['string'],
            'due_date'          => ['date'],
            'due_time'          => ['string'],
        ]);

        if ($request->is_active==null) {
            $validated['is_active'] = '0';
        }

        $task->update($validated);

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return View
     */
    public function destroy(Task $task)
    {
        $this->checkPermission('task.destroy');
        $task->delete();
        return back()->with('delete', 'Task deleted successfully.');
    }

    public function status(Task $task): \Illuminate\Http\RedirectResponse
    {
        if ($task->is_active==0) {
            $task->is_active ='1';
        } else {
            $task->is_active ='0';
        }

        $task->update();

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function search(Request $request)
    {
        $tasks = Task::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('task.taskTable', compact('tasks'));
    }
}
