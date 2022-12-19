<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $newestProducts = Product::orderBy('created_at',"DESC")->offset(0)->limit(3)->get();
        return view('index',compact('newestProducts'));
    }
}
