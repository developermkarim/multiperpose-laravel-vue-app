<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::latest()->get();
        return $user;

    }
    public function store()
    {
        $user = User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=> bcrypt(request('password'))
        ]);
        return $user;
    }
}
