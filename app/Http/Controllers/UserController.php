<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::orderBy('id','desc')->paginate();
        return view('users.users')->with([
            'users' => $users
        ]);
    }
}
