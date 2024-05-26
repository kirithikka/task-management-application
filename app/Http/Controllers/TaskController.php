<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::get(),
        ]);
    }

    public function delete(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
