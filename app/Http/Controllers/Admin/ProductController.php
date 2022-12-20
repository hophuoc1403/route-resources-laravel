<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoteProductRequest;
use App\Models\Category;
use App\Models\Product;
use http\Env\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\isEmpty;


class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    public function update($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.update', ['categories'=>$categories,'product'=>$product]);
    }

    public function handleAdd(StoteProductRequest $productRequest)
    {
        $productRequest->validated();
        if ($productRequest->has("file")) {
            $file = $productRequest->file;
            $fileName = $file->getClientOriginalName();
            $productAdd = $productRequest->merge(['image' => $fileName]);
        }
        try {
            Product::create(isset($productAdd) ? $productAdd->all() : $productRequest->all());
            $file->move("uploads", $fileName);
            return redirect()->route('admin.product')->with("success", 'add success');
        } catch (\Throwable $err) {
            return redirect()->route('admin.product')->with("error", 'add failed beacause' . $err->getMessage());
        }
    }

    public function handleUpdate(StoteProductRequest $productRequest, $id)
    {
        $productRequest->validated();
        $product = Product::find($id);
        if ($productRequest->has("file")) {
            $file = $productRequest->file;
            File::delete(public_path('uploads/'.$product->image));
            $fileName = $file->getClientOriginalName();
            $file->move("uploads", $fileName);
            $productUpdate = $productRequest->merge(['image' => $fileName]);
        }

        try {
            $product->update(isset($productUpdate) ? $productUpdate->all() : $productRequest->except('file'));
            return redirect()->route('admin.product')->with("success", 'Update success');
        } catch (\Throwable $err) {
            return redirect()->route('admin.product')->with("error", 'Update failed because ' . $err->getMessage());
        }
    }

    public function delete($id)
    {        $product = Product::find($id);
        $product->image !== "" && File::delete(public_path('uploads/'.$product->image));
        try {
            Product::find($id)->delete();
            return redirect()->route('admin.product')->with('success', "delete Category success");
        } catch (\Throwable $err) {
            return redirect()->route('admin.product')->with('error', "delete Category failed" . $err->getMessage());
        }
    }

    public function newestProduct(){
        $newestProducts = Product::orderBy('created_at',"DESC")->offset(0)->limit(8)->get();
        $saleProducts =new  Product;
        return view('index',['newestProducts'=>$newestProducts ?? [],'saleProducts'=>$saleProducts->getBestSale(8) ?? []]);
    }

    public function show($id){
        $product = Product::find($id);
        return view('productDetail',compact('product'));
    }
    public function handleSearch(\Illuminate\Http\Request $request){
        if($request->name !== null){
       $result =  new Product;
       return view('search',['result'=>$result->search() ?? [],'query'=>request()->name ?? ""]);
        }else {
            return redirect()->back();
        }

    }
}
