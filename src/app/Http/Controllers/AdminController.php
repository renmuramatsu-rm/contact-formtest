<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller {
    public function index(){
        $categories = Category::all();
        return view('admin', compact('categories'));
    }
}

