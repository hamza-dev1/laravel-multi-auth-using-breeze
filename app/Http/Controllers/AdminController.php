<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function loginPage() {
        return view('admin.login');
    }

    public function registerPage() {
        return view('admin.register');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

}
