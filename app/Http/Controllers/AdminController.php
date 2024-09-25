<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function userDisplay(User $user){
        //fetch all users
        $users = User::all();

        return view ('Admin.dashboard', ['users' =>$users]);
    }

    public function userEdit(User $user){
        return view('Admin.editUsers', ['user'=>$user]);
    }

    public function userUpdate(User $user, Request $request){

        $data = $request ->validate([
            'id' => 'required',
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'role' =>  'required|string',
            'password' => 'required|string',

        ]);
        $user ->update($data);{
            return redirect('admin/dashboard')->with('success','User Information Updated Successfully');
        }
    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect ('admin/dashboard')->with('success', 'User Deleted Successfully');

    }
}
