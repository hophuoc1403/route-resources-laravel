<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function category(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function product(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
}
