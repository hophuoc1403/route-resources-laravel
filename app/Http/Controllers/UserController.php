<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function handleRegister(StoreUserRequest $userRequest)
    {
        $accountValidated = $userRequest->validated();
        try {
            $accountValidated['password'] = Hash::make($userRequest->password);
            User::create($accountValidated);
            return redirect()->route('user');
        } catch (\Throwable $err){
            dd($err);
        }
    }

    public function handleLogin(Request $userRequest)
    {
        $accountValidated = $userRequest->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        try {
           return  Auth::attempt($accountValidated) ? redirect()->route('user') : redirect()->back()->with('error','invalid information');

        }catch (\Throwable $err){
                dd($err);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

    public function adminLogin(){
        return view('auth.login');
    }

    /**
     * @throws \Throwable
     */
    public function  handleAdminLogin(Request $userRequest){
        $accountValidated = $userRequest->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        try{
            if(Auth::attempt($accountValidated)){
                if(Auth::user()->role == 1){
                    return redirect()->route('admin');
                }else {
                    return redirect()->back()->with('err','your account is not admin account');
                }
            }
        }catch (\Throwable $err){
            throw new $err;
        }
    }
}
