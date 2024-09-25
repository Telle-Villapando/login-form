<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\DB;
use Illuminate\Support\Mail;
use Illuminate\Http\Request;


class ForgetPasswordController extends Controller
{
    //
    function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email |exists:user',
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send();

    }
}
