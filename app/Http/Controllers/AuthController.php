<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => ['string','required','email'],
            'password' => ['string','required']
        ]);
        if(Auth::attempt($data))
        {
            return redirect()->route('project.main');
        }
        return redirect()->route('login');
    }
    public function signup()
    {
        return view('auth.registration');
    }
    public function registration(Request $request)
    {
        $this->authService->checkRegistration($request);
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function editUser()
    {
        $tasks = Task::all();
        $projects = Project::all();
        $users = User::all();
        return view('user.edit', ['tasks' => $tasks, 'projects' => $projects, 'users' => $users]);
    }
}
