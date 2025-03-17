<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user'); // نام فایل بلید شما
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'کاربر احراز هویت نشده است.'], 401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|numeric|digits:11|unique:users,mobile,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        return response()->json(['success' => 'اطلاعات با موفقیت به‌روزرسانی شد.']);
    }  
      public function logout(Request $request)
        {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect()->intended(route('welcome'));
            
        }
    }

    
    

