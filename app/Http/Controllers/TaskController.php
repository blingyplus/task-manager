<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        if ($request->has('priority')) {
            $tasks = Task::orderBy('priority')->get();
            foreach ($tasks as $index => $task) {
                $task->update(['priority' => $index + 1]);
            }
        }

        return redirect()->route('tasks.index');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function updateOrder(Request $request)
    {
        $taskIds = $request->input('taskIds');

        // Update the task priorities based on the received task IDs
        foreach ($taskIds as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['message' => 'Task order updated successfully']);
    }
}
