<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function user(){
        return view('auth.register');
    }

    //いらん？
    // public function login(UserRequest $request){
    //     $user=$request->only(['name','email','password']);
    //     return view('login',compact('user'));
    // }

    //登録ボタンを押す→ログインページへ
    public function store(UserRequest $request){
        $user=$request->only(['name','email','password']);
        User::create($user);
        return view('auth.login');
    }
    //ログインボタンを押す→管理画面へ
    public function login(){
        return view('admin');        
    }

}
