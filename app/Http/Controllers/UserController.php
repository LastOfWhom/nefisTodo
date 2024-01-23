<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('editUser');
    }
}
