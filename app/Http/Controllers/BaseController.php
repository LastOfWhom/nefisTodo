<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\TaskService;

class BaseController extends Controller
{
    protected TaskService $taskService;
    protected AuthService $authService;
    public function __construct(TaskService $taskService, AuthService $authService)
    {
        $this->taskService = $taskService;
        $this->authService = $authService;
    }
}
