<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import Validator facade
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\RateLimiter;

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

    public function signInUser(Request $request)
    {
        $key = 'signIn:' . $request->ip(); // Unique key for rate limiting
        $maxAttempts = 3; // Max login attempts
        $decayMinutes = 1; // Minutes before the attempts are reset

         // Check the rate limit
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
        return redirect()->back()->with('message', 'Too many login attempts. Please try again later.');
        }

        // Validate the request input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the user with the 'remember me' option
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // If "Remember Me" is checked, store the email in a cookie
            if ($request->filled('remember')) {
                Cookie::queue('remembered_email', $request->email, 60*24*30); // Store for 30 days
            } else {
                Cookie::queue(Cookie::forget('remembered_email')); // Remove the cookie if unchecked
            }
    
            // Redirect to appropriate dashboard
            if ($request->user()->role === 'admin') {
                return redirect('admin/dashboard');
            }
            return redirect('user/dashboard');
        }
         // Increment the attempts if login fails
         RateLimiter::hit($key, $decayMinutes * 60);
    
        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials, try again']);
    }
    


    public function logout(){
        Auth::logout();
        return redirect(route('user.signIn'));
    }
    
}
