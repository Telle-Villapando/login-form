<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import Validator facade

class AuthController extends Controller
{
    public function registerRoute(){
        return view ('AuthLogin.register');
    }

    public function signInRoute(){
        return view('AuthLogin.signIn');
    }

    public function userDashboard(){
        return view('User.dashboard');
    }

    public function registerUser(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return redirect(route('user.signIn'));
    }

    public function signInUser(Request $request){
      
        Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ])->validate();

        // Use Auth::attempt instead of auth()->attempt for clarity
        if (Auth::attempt(request()->only(['email', 'password']))) {
            
            if($request ->user()->role === 'admin'){
                return redirect('admin/dashboard');
            }

            return redirect(route('user.dashboard'));
        }

        // Redirect back with an error message if credentials are invalid
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout(){
        Auth::logout();
        return redirect(route('user.signIn'));
    }
    
}
