<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'npk' => 'required|numeric|digits:5',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('npk', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['npk' => 'Invalid NPK or password'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

