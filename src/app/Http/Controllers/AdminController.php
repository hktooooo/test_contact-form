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

    public function search(Request $request)
    {

        // フォームからの入力を取得
        $name_email = $request->input('name_email');
        $gender     = $request->input('gender');
        $category_id = $request->input('category_id');   
        $date       = $request->input('date');

        // 検索実行
        $contacts = Contact::with('category')->KeywordSearch($name_email, $gender, $category_id, $date)->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
