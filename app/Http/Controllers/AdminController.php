<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        //return view('admin.login');
        //dd($request->all());

        $data = $request->all();

        $check = Auth::guard('admin')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        if ($check) {
            return redirect()->route('admin.dashboard')->with('success', 'You\'ve logged in successfully');
        }
        return redirect()
                ->route('admin.login-page')
                ->with('error', 'Invalid credentials');
    }

    public function loginPage()
    {
        if (!Auth::check()) {
            return view('admin.login');
        }
        return redirect()->route('admin.dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'min:3',
                'max:20'
            ],
            'email' => [
                'required',
                'unique:admins,email'
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed'
            ]
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        Admin::create($data);

        return redirect()
                ->route('admin.login');
    }

    public function registerPage()
    {
        return view('admin.register');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'You\'ve logged out successfully');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
