<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function admin()
    {
        return view('admin');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
}
