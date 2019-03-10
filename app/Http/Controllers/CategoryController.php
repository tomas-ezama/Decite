<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index() {
        return view('admin');
    }

    public function createCategory(Request $request)
    {
         Category::create([
            'name' => $request->input('name'),
        ]);
        return view('admin');
    }
    public function deleteCategory(Request $request)
    {
        $categoria = Category::find($request->category);
        $categoria -> delete();
        return view('admin');

    }
}
