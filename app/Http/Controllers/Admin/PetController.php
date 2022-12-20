<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetsRequest;
use App\Models\Category;
use App\Models\Pet;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pets = Pet::all();
        return view('admin.pet.index',compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pet.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePetsRequest $request)
    {
         $request->validated();
        if($request->has('file')){
            $file_name =time() .  $request->file->getClientOriginalName();
            $request->file->move('uploads',$file_name);
        }
        $request = $request->merge(['image'=> $file_name ?? null]);

        try {
            Pet::create($request->all());
            return redirect()->route('pet.index')->with('success','add pet success');
        }catch (\Throwable $err){
            dd($err)  ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $pet = Pet::find($id);
        return view('admin.pet.update',['pet'=>$pet,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePetsRequest $request, $id)
    {
        $currentPet = Pet::find($id);
        $request->validated();
        if($request->has('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            \Illuminate\Support\Facades\File::delete('uploads/'.$currentPet->image);
            $file->move('uploads',$file_name);
        }
        $updatePet = $request->merge(['image'=>$file_name ?? $currentPet->image]);
        try {
            $currentPet->update($updatePet->all());
            return redirect()->route('pet.index');
        }catch (\Throwable $err){
            dd($err);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Pet::find($id)->delete()){
            return redirect()->back();
        }else{
            return redirect()->back()->with('err','delete failed');
        }

    }
}
