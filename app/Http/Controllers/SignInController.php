<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    public function index() {
        return view('usersignin');
        
    }
    public function signin(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
    
        if ($user) {
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return redirect()->route('welcome')->with('success', 'ثبت نام با موفقیت انجام شد');
        } else {
            return redirect()->back()->with('error', 'ثبت نام با خطا مواجه شد');
        }
    }
}
