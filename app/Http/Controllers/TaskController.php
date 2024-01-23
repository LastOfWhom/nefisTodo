<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends BaseController
{
    public function store()
    {
        $data = request()->validate([
            'text' => 'string',
            'project_id' => 'integer'
        ]);
        $this->taskService->writeInDB($data);
        return redirect()->route('project.show', $data['project_id']);
    }

    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }
    public function update(Task $task)
    {
        $data = request()->validate([
            'text' => 'string'
        ]);
        $task->update($data);
        return redirect()->route('project.show', $task->project_id);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('project.show', $task->project_id);
    }
    public function active()
    {
        $tasks = Task::where('user_id', Auth::id())->where('completed', 0)->get();
        return view('task.active', ['tasks' => $tasks]);
    }
    public function completed()
    {
        $tasks = Task::where('user_id', Auth::id())->where('completed', 1)->get();
        return view('task.completed', ['tasks' => $tasks]);
    }
    public function finished(Task $task)
    {
        $this->taskService->chechedStatus($task, request()->only('completed'));
        return redirect()->route('project.show', $task->project_id);

    }
}
