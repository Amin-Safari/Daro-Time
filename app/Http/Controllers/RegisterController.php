<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;



class RegisterController extends Controller
{
    public function index()  {
        return view('register');
        
    }
    public function register(Request $request)  {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $email = $request->input('email');
        $user = Register::where('email', $email)->first();
        if ( $user) {
            return redirect()->back()->with('message', 'لینک بازنشانی رمز عبور شما را ایمیل کرده ایم!');
        }
        $token= str()->random(64);
        Register::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

     
        $resetLink = route('register.pass', ['token' => $token]); 

        Mail::send('mailregister', ['token' => $token, 'resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->back()->with('succes', 'لینک بازنشانی رمز عبور شما با موفقیت ارسال شد');

    }
    public function form($token)  {
        return view('registerpass', ['token'=>$token]);
    }

    public function pass(Request $request)  {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'token'=>'required'
        ]);
        $token = $request->input('token');
        $user = Register::where('token', $token)->first();
        if ( $user) {

            $email = $user->email;

            User::where('email', $email)->update([
                'password' => Hash::make($request->password),
            ]);
            Auth::attempt([
                'email' => $email, 
                'password' => $request->password,
            ]);
            Register::where('token', $token)->delete();
            return redirect()->route('welcome');
        }else{
            return redirect()->back()->with('erorr','erorr');
        }
    }

}
