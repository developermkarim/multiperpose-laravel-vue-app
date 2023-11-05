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
            'name'=>'required|string',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:5|max:8'
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
            'name'=>'required|string',
            'email' => 'required|unique:users,email,' . $user->id,
            'password'=>'sometimes|min:5|max:8'
        ]);

        $user->update([
            'name'=> request('name'),
            'email'=>request('email'),
            'password'=> request('password') ? bcrypt(request('password')) : request('password'),
        ]);
        return $user;
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $isDeleted = $user->delete();
        return response()->noContent();
/*         if ($isDeleted) {
            return true;
        }else{
            return false;
        } */
    }
}
