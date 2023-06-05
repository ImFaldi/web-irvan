<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect('/')->with('success', 'Register successfully');
        } else {
            return redirect('/')->with('error', 'Register failed');
        }

    }
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->session()->regenerate();

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard.admin');
            } if (Auth::user()->role == 'petugas') {
                return redirect()->route('dashboard.petugas');
            } if (Auth::user()->role == 'user') {
                return redirect()->route('dashboard.user');
            } else {
                return redirect()->back()->with('error', 'Login failed');
            }
        } else {
            return redirect()->back()->with('error', 'Login failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/')->with('success', 'Logout successfully');
    }
}
