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
        $user = User::latest()->paginate();
        
   /*      $user = User::latest()->get()->map(function($user){

            return [
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
                'created_at'=> $user->created_at->toFormattedDate()
            ];
        }); */
         
        return $user;
    }

    public function store()
    {
        request()->validate([
            'name'=>'required|string',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:5|max:15'
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
            'password'=>'sometimes|min:5|max:15'
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
         $user->delete();
        return response()->noContent();
/*         if ($isDeleted) {
            return true;
        }else{
            return false;
        } */
    }

    public function changeRole(User $user)
    {
        $user->update([
            'role' => request('role'),
        ]);

        return response()->json(['success' => true]);
    }
    
    public function searchText()
    {
        $searchQuery = request('query');

        $users = User::where('name', 'like', "%{$searchQuery}%")->paginate();

        return response()->json($users);
    }

    public function bulkDeleted()
    {
        $ids = request('ids');

        $selectedDelete = User::whereIn('id', $ids)->delete();
        if($selectedDelete){
            return response()->json(['message'=> 'Users deleted successfully']);
        };
    }
}
