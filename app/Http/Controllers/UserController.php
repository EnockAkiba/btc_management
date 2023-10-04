<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);

        return view('users.index', compact('users'));
    }

    public function edit()
    {
        return view('users.edit');
    }
}
