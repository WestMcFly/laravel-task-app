<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = Task::query();

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('task_name', 'like', '%'.$search.'%')
                ->orWhere('task_location', 'like', '%'.$search.'%')
                ->orWhere('category', 'like', '%'.$search.'%')
                ->orWhere('materials_required', 'like', '%'.$search.'%');
            });
        }

        switch ($sort) {
            case 'deadline':
                $query->orderBy('deadline', 'asc');
                break;
            case 'task_name':
                $query->orderBy('task_name', 'asc');
                break;
            case 'category':
                $query->orderBy('category', 'asc');
                break;
            default:
                $query->orderBy('task_name', 'asc');
        }
        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'search', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_location' => 'nullable|string|max:255',
            'time_complexity' => 'required|integer|min:1|max:5',
            'materials_required' => 'nullable|string',
            'deadline' => 'nullable|date',
            'priority' => 'nullable|integer|min:1|max:3',
            'category' => 'nullable|string|max:255',
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
           'task_name' => 'required|string|max:255',
           'task_location' => 'nullable|string|max:255',
           'time_complexity' => 'required|integer|min:1|max:255',
           'materials_required' => 'nullable|string',
           'deadline' => 'nullable|date',
           'priority' => 'nullable|integer|min:1|max:3',
           'category' => 'nullable|string|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
