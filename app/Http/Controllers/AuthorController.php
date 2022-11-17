<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{

    public function login(Request $request) {
        $data = $request->all();
        $check = Auth::guard('author')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        if ($check) {
            return redirect()
                    ->route('author.dashboard')
                    ->with('success', 'You\'ve logged in successfully');
        }
        return redirect()
                ->route('author.login-page')
                ->with('error', 'Invalid credentials');
    }

    public function loginPage()
    {
        return view('author.login');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => ['required', 'min:3', 'max:60'],
            'email' => ['required', 'unique:authors,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        Author::create($data);

        return redirect()
                ->route('author.login');
    }

    public function registerPage()
    {
        return view('author.register');
    }

    public function dashboard() {
        return view('author.dashboard');
    }

}
