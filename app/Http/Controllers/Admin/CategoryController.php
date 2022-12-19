<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoteCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function add(){
        return view('admin.category.add');
    }
    public function update($id){
        $category = Category::find($id);
        return view('admin.category.update',compact('category'));
    }

    public function handleAdd(StoteCategoryRequest $category){
        $validate = $category->validated();
        try {
            Category::create($category->except('_token'));
        return redirect()->route('admin.category')->with('success',"add Category success");
        }catch (\Throwable $err){
            return redirect()->route('admin.category')->with('error',"add Category failed".$err->getMessage());
        }
    }
    public function handleUpdate(StoteCategoryRequest $categoryRequest,$id){
        $validate = $categoryRequest->validated();

        try {
            Category::find($id)->update($categoryRequest);
            return redirect()->route('admin.category')->with('success',"update Category success");
        }catch (\Throwable $err){
            return redirect()->route('admin.category')->with('error',"update Category failed".$err->getMessage());

        }
    }

    public  function  delete($id){
        try {
            Category::find($id)->delete();
            return redirect()->route('admin.category')->with('success',"delete Category success");
        }catch (\Throwable $err){
            return redirect()->route('admin.category')->with('error',"delete Category failed".$err->getMessage());

        }

    }
}
