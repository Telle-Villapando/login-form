<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;    // Import DB facade
use Illuminate\Support\Facades\Mail;  // Import Mail facade
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    //
    function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email |exists:users',
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgetPasswordEmail', ['token'=>$token], function ($message) use ($request){

            $message->to($request->email);
            $message->subject("Reset Password");

        });

        return redirect()->to(route('user.signIn'))->with('success','Password Reset link sent successfully');
       

    }
    function resetPassword($token){
        return view('emails.newPassword', compact('token'));
    }       
    function resetPasswordPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        // Check for the existing token
        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();
    
        // Validate the token
        if (!$updatePassword) {
            return redirect()->to(route('user.resetPassword'))->with('error', 'Invalid token or email.');
        }
    
        // Update user password 
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
    
        // Delete used token
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        
        return redirect()->to(route('user.signIn'))->with('success', 'Password reset successful.');
    }
    
}
