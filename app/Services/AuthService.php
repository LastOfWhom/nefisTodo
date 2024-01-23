<?php

namespace App\Services;

use App\Http\Controllers\BaseController;
use App\Models\User;

class AuthService
{
    public function checkRegistration($request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:3']
        ]);
        User::create([
            'email' => $request->email,
            'password' => $request->password
        ]);
        $request->session()->regenerate();
    }
}
