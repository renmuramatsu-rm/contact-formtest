<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::paginate(7);
        return view('admin', compact('contacts'));
    }

    public function search(Request $request)
    {
        $todos = Contact::with('contact')->KeywordSearch($request->keyword)->get();
        $contacts = Contact::all();

        return view('admin', compact('contacts'));
    }
}
