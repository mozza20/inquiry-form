@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
    <div class="header-nav-button">
        <a class="header-nav__button--register" href="/register">Register</a>
    </div>
@endsection

@section('content')
<div class="login">
    <h2>Login</h2>
    <div class="login-form">
        <form class="login-form__inner" action="{{route('login')}}" method="POST">
            @csrf
            <div class="login-form__row">
                <label class="login-form__item-label">メールアドレス</label>
                <input class="login-form__item-input" type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
                <div class="error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </?div>
            <div class="login-form__row">
                <span class="login-form__item-label">パスワード</span>
                <input class="login-form__item-input" type="password" name="password"  placeholder="例：coachtech1106">
                <div class="error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="login-form__button">
                <button class="login-form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection('content')
