<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        // 入力値の取得
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_first', 'tel_secont', 'tel_third', 'address', 'building', 'category', 'detail']);

        // 電話番号の結合処理
        $tel = $contact[$tel_first] .$contact[$tel_second] . $contact[$tel_third];

        return view('confirm', [
                    'last_name' => $contact['last_name'],
                    'first_name' => $contact['first_name'],
                    'gender' => $contact['gender'],
                    'email' => $contact['email'],
                    'tel' => $tel,
                    'address' => $contact['address'],
                    'building' => $contact['building'],
                    'category' => $contact['category'],
                    'detail' => $contact['detail'],
                ]);
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);
        return view('thanks');
    }
}
