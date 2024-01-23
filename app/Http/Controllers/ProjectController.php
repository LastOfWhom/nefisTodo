<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\text;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::where('user_id', Auth::id())->get();
        return view('main', ['projects' => $project]);
    }
    public function store()
    {
        $data = request()->validate([
            'text' => 'string'
        ]);
        Project::create([
            'text' => $data['text'],
            'user_id' => Auth::id()
        ]);
        return redirect()->route('project.main');
    }

    public function show(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->where('user_id', Auth::id())->get();
        return view('task.index', ['tasks' => $tasks , 'project_id' => $project->id]);
    }
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', ['project' => $project]);
    }
    public function update(Project $project)
    {
        $data = request()->validate([
            'text' => 'string'
        ]);
        $project->update($data);
        return redirect()->route('project.main');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.main');
    }
}
