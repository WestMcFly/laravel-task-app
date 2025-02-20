@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="task_name" class="block mb-1">Task Name</label>
                <input type="text" name="task_name" id="task_name" required
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="task_location" class="block mb-1">Location (Optional)</label>
                <input type="text" name="task_location" id="task_location"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="time_complexity" class="block mb-1">Time Estimate</label>
                <select name="time_complexity" id="time_complexity" required
                        class="w-full border rounded px-3 py-2">
                    <option value="1">~10 minutes</option>
                    <option value="2">~30 minutes</option>
                    <option value="3">~1 hour</option>
                    <option value="4">~4 hours</option>
                    <option value="5">~1 day</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="materials_required" class="block mb-1">Materials Required (Optional)</label>
                <input type="text" name="materials_required" id="materials_required"
                       class="w-full border rounded px-3 py-2"
                       placeholder="e.g., Trash Bags, Broom">
            </div>

            <div class="mb-4">
                <label for="deadline" class="block mb-1">Deadline (Optional)</label>
                <input type="datetime-local" name="deadline" id="deadline"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="priority" class="block mb-1">Priority (Optional)</label>
                <select name="priority" id="priority" class="w-full border rounded px-3 py-2">
                    <option value="">Select Priority</option>
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block mb-1">Category (Optional)</label>
                <input type="text" name="category" id="category"
                       class="w-full border rounded px-3 py-2"
                       placeholder="e.g., chores, work, health">
            </div>

            <div class="flex gap-4">
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Task
                </button>
                <a href="{{ url('/') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection