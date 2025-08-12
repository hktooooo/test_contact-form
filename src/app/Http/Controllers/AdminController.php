<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function admin()
    {
        $contacts = Contact::all();
    
        return view('admin', compact('contacts'));
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $user = $request->only([
            'name',
            'email',
            'password'
        ]);
        User::create($user);

        return redirect('/register');
    }

    public function login()
    {
        return view('login');
    }
}
