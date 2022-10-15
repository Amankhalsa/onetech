<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function adminViewCategory(){
    //    $viewCategory = Category::all();
       return view('admin.category.view_category');
    }
}
