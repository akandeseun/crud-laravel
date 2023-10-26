<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    //
    public function index(): Response
    {
        $task = Task::all();
        // dd($task);
        return response(["data" => $task]);
    }

    public function store(Request $request): Response
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return response(["data" => $task]);
    }

    public function show($id): Response
    {
        $task = Task::findOrFail($id);
        return response(["data" => $task]);
    }

    public function update(Request $request, $id): Response
    {
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return response([
            "message" => "Task Updated",
            "data" => $task
        ]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response([
            "message" => "Task Deleted",
        ]);
    }
}
