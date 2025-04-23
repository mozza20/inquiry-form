<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user['password']=Hash::make($user['password']);
        User::create($user);
        return redirect('/login')->with('status','登録が完了しました');
    }
    //ログインボタンを押す→管理画面へ
    public function login(){
        return view('admin');        
    }
    //ログアウト
    public function logout(Request $request){
        Auth::logout();//認証情報クリア
        $request->session()->invalidate();//セッションを無効化
        $request->session()->regenerateToken();//CSRFトークンを再生成
        return redirect('/login');
    }

}
