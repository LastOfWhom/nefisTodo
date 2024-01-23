<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function chechedStatus($task, $dataCompleted)
    {
        $completed = ($dataCompleted['completed']== 0) ? 1 : 0;
        $task->update(['completed' => $completed]);
    }
    public function writeInDB($data)
    {
        Task::create([
            'text' => $data['text'],
            'user_id' => Auth::id(),
            'project_id' => $data['project_id'],
            'completed' => 0
        ]);
    }
}
