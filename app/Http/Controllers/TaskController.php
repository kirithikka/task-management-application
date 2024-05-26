<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Tasks Index
     *
     */
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::get(),
        ]);
    }

    /**
     * Show a task
     *
     */
    public function show()
    {
        return Inertia::render('Tasks/Show');
    }

    /**
     * Add a task
     *
     */
    public function add(Request $request): RedirectResponse
    {
        $taskData = $request->all();
        
        Task::create([
            'user_id' => Auth::user()->id,
            'title' => $taskData['title'],
            'description' => $taskData['description'],
            'due_date' => $taskData['due_date'],
            'status' => $taskData['status'],
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Delete a task
     *
     */
    public function delete(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
