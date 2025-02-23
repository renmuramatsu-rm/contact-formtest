<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
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
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $genderMap = [
            '男性' => 1,
            '女性' => 2,
            'その他' => 3,
        ];

        $contact = $request->only(['first_name', 'last_name', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        $contact['gender'] = $genderMap[$request->input('gender')];
        Contact::create($contact);
        return view('thanks');
    }
    public function back(ContactRequest $request)
    {
        $categories = DB::table('categories')->get();
        return redirect('index')->with('categories', $categories)->withInput();
    }
}
