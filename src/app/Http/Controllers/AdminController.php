<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function admin(Request $request)
    {
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();

        $name_email  = $request->input('name_email');
        $gender      = $request->input('gender');
        $category_id = $request->input('category_id');
        $date        = $request->input('date');

        if (empty($request)) {
            $name_email = "";
            $gender     = "";
            $category_id = "";
            $date       = "";
        };

        return view('admin', compact(
            'contacts',
            'categories',
            'name_email',
            'gender',
            'category_id',
            'date'
        ));
    }

    public function search(Request $request)
    {
        // フォームからの入力を取得しまとめる
        $name_email = $request->input('name_email');
        $gender     = $request->input('gender');
        $category_id = $request->input('category_id');   
        $date       = $request->input('date');
        $filters = [
            'name_email'  => $name_email,
            'gender'      => $gender,
            'category_id' => $category_id,
            'date'        => $date,
        ];

        // 検索実行
        $contacts = Contact::with('category')->KeywordSearch($filters)->paginate(7);

        $categories = Category::all();

        return view('admin', compact(
            'contacts',
            'categories',
            'name_email',
            'gender',
            'category_id',
            'date'
        ));
    }

    public function destroy(Request $request)
    {
        // 削除実行
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function exportFilteredUsers(Request $request)
    {
        // フォームからの入力を取得
        $name_email = $request->input('name_email');
        $gender     = $request->input('gender');
        $category_id = $request->input('category_id');   
        $date       = $request->input('date');

        // 絞り込みクエリ
        $query = Contact::query();

        if (!empty($name_email)) {
            $query->where(function ($q) use ($name_email) {
                $q->where('first_name', 'like', "%{$name_email}%")
                ->orWhere('last_name', 'like', "%{$name_email}%")
                ->orWhere('email', 'like', "%{$name_email}%");
            });
        }

        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }

        $users = $query->get();

        // 全カラム取得（1件目からキーを抽出）
        $headers = array_keys($users->first()->toArray());

        // CSV生成
        $filename = 'contact_data_' . now()->format('Ymd_His') . '.csv';
        $path = 'exports/' . $filename;

        $csv = implode(',', $headers) . "\n";

        foreach ($users as $user) {
            $row = [];
            foreach ($headers as $key) {
                $value = $user->$key;

                // 日付型は整形
                if ($value instanceof \Carbon\Carbon) {
                    $value = $value->format('Y-m-d H:i:s');
                }

                // エスケープ処理
                $row[] = '"' . str_replace('"', '""', (string) $value) . '"';
            }
            $csv .= implode(',', $row) . "\n";
        }

        Storage::put($path, $csv);

        return redirect('admin');
    }
}
