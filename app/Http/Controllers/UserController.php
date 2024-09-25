<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('User.profile', ['user' => $user]);
    }

    public function publicProfile(User $user){
        return view('User.publicProfile',['user'=>$user]);
    }

    public function profileUpdate(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        // Use update method, which internally calls save
        $user->update($data);
        if($request ->user()->role === 'admin'){
            return redirect('admin/dashboard');
        }

        

        return redirect('user/dashboard')->with('success', 'User Information Updated Successfully');
    }

    public function cancelProfileUpdate(User $user){
        if(Auth::user()->role === 'admin'){
            return redirect('admin/dashboard');
        }

        return redirect(route('user.dashboard'));
    }

    public function forgotPassword(){
        return view('AuthLogin.forgotPassword');
    }


    
}
