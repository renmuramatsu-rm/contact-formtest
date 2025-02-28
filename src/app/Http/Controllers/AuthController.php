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
        $genderMap = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);
        $genders = Contact::select('gender')
            ->distinct()
            ->whereNotNull('gender')
            ->whereIn('gender', [1, 2, 3])
            ->pluck('gender')
            ->map(fn($g) => (int) $g)
            ->toArray();
        return view('admin', compact('contacts','genders','categories','genderMap'));
    }

    public function search(Request $request)
    {
        $genderMap = [
            '1' => '男性',
            '2' => '女性',
            '3' => 'その他',
        ];

        $genders = Contact::select('gender')->distinct()->pluck('gender')->toArray();
        $contacts = Contact::with('category');

        if ($request->filled('keyword')) {
            $contacts->where(function ($query) use ($request) {
                $query->where('first_name', 'like', "%{$request->keyword}%")
                ->orWhere('last_name', 'like', "%{$request->keyword}%")
                ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $contacts->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $contacts->where('category_id', $request->category_id);
        }

        if ($request->filled('created_at')) {
            $contacts->whereDate('created_at', $request->created_at);
        }

        $contacts = $contacts->paginate(7);
        $categories = Category::all();

        session(['search_results' => collect($contacts->items())->pluck('id')->toArray()]);


        return view('admin', compact('contacts','genders','categories', 'genderMap'));
    }
    
}
