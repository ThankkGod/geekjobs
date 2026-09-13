<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class JobCategoryContoller extends Controller
{
    function category(Category $category) {
        $category->posts()->latest()->get();
        return view('jobcate.index', compact('category'));
    }
}
