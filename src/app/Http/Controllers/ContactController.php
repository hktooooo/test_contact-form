<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        // お問い合わせの種類 一覧取得
        $categories = Category::all();
        
        return view('index', compact('categories'));
    }

    // public function confirm()
    // {
    //     return view('confirm');
    // }

    // public function store()
    // {
    //     return view('thanks');
    // }

    public function confirm(Request $request)
    {
        // 入力値の取得
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel_first',
            'tel_second',
            'tel_third',
            'address',
            'building',
            'detail'
        ]);

        // 電話番号の結合処理
        $tel = $contact['tel_first'] . $contact['tel_second'] . $contact['tel_third'];

        // お問い合わせの種類 対応データ取得
        $categories = Category::all();
        $category = $categories->firstWhere('id', $contact['category_id']);

        return view('confirm', [
            'category_id' => $contact['category_id'],
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tel' => $tel,
            'address' => $contact['address'],
            'building' => $contact['building'],
            'detail' => $contact['detail'],
            'content' => $category['content']
        ]);
    }

    public function store(Request $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail'
        ]);
        Contact::create($contact);
        return view('thanks');
    }
}
