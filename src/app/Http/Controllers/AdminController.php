<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function admin()
    {
        $contacts = Contact::all();
        $categories = Category::all();
    
        return view('admin', compact('contacts', 'categories'));
    }

    public function register()
    {
        return view('register');
    }
}
