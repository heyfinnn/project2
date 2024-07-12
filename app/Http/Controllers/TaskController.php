<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return view('dashboard.tasks.index');
    }

    public function getTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json('Task deleted successfully');
    }
}
