<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function index() {
        return view('usersignup');
        
    }
    public function signup(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        } else {
            return redirect()->back()->with('error', 'ایمیل یا رمز عبور اشتباه است.');
        }
    }
}
