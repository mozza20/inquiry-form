@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
    <div class="header__button">
        <a class="header__button--login" href="/login">login</a>
    </div>
@endsection

@section('content')
<div class="register">
    <div class="register__title">
        <h2>Register</h2>
    </div>
    <div class="register-form">
        <form class="register-form__inner" action="/register" method="post">
            @csrf
            <div class="register-form__row">
                <label class="register-form__item-label">お名前</label>
                <input class="register-form__item-input" type="text" name="name" placeholder="例：山田　太郎" value="{{old('name')}}">
                @error('name')
                {{$message}}
                @enderror</br>
            </div>
            <div class="register-form__row">
                <label class="register-form__item-label">メールアドレス</label>
                <input class="register-form__item-input" type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
                @error('email')
                {{$message}}
                @enderror</br>
            </div>
            <div class="register-form__row">
                <label class="register-form__item-label">パスワード</label>
                <input class="register-form__item-input" type="password" name="password" placeholder="例：coachtech1106">
                @error('password')
                {{$message}}
                @enderror</br>
            </div>
            <button class="register-form__button-submit" type="submit">登録</button>
        </form>
    </div>
</div>
@endsection('content')