<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function contact()
    {
        $categories = Category::all();

        return view('category', compact('categories'));
    }
}
