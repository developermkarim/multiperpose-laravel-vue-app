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
        request()->validate([
            'email' => 'required|unique:users,email',
        ]);

        $user = User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=> bcrypt(request('password'))
        ]);
        return $user;
    }
 
    public function update(User $user)
    {
        request()->validate([
            'email' => 'required|unique:users,email' . $user->id,
        ]);

        $updateUser = $user->update([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=> request('password') ? bcrypt(request('password')) : request('password'),
        ]);
        return $updateUser;
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $isDeleted = $user->delete();
        dd($isDeleted);
        if ($isDeleted) {
            return true;
        }else{
            return false;
        }
    }
}
