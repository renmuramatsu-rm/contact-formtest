<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
    
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($contact['category_id']);
        $contact['content'] = $category->content;
        return view('confirm', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $genderMap = [
            '男性' => 1,
            '女性' => 2,
            'その他' => 3,
        ];

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);

        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
// テーブル保存用にtelを結合

        $contact['gender'] = $genderMap[$contact['gender']];
        $contact['category_id'] = (int) $contact['category_id'];
        Contact::create($contact);
        return view('thanks');
    }
    public function back(ContactRequest $request)
    {
        $categories = DB::table('categories')->get();
        return redirect('/')->with('categories', $categories)->withInput();
    }
}
