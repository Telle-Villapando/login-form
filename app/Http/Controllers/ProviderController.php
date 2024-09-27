<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class ProviderController extends Controller
{
    //
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider){
        $socialUser = Socialite::driver($provider)->user();
        
        
        $user = User::updateOrCreate([
            'provider_id' => $socialUser->id,
            'provider' => $provider
        ],
 [
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'provider_token' => $socialUser->token,
          
        ]);
     
        Auth::login($user);
     
          // Redirect to appropriate dashboard
          if ($request->user()->role === 'admin') {
            return redirect('admin/dashboard');
        }
        return redirect('user/dashboard');
    }

  
}
