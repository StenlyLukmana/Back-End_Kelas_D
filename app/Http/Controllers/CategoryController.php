<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function createCategoryPage() {
        return view('createCategory', ['title' => 'Create Category']);
    }

    public function createCategory(Request $request) {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect(route('view'));
    }

}
