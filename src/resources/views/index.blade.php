@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact">
    <div class="contact-form">
        <h2>Contact</h2>
        <form class="contact-form__inner" action="{{route('contact.confirm')}}" method="POST">
            @csrf
            <div class="contact-form__row">
                <label class="contact-form__item-label">お名前<span>※</span></label>
                <div class="contact-form__item--name">
                    <input class="contact-form__item-input--last-name" type="text" name='last_name' placeholder="例：山田" value="{{old('last_name')}}">
                </div>
                <div class="contact-form__item--name">
                    <input class="contact-form__item-input--first-name" type="text" name='first_name' placeholder="例：太郎" value="{{old('first_name')}}">
                </div>
                @error('last_name')
                {{$message}}
                @enderror</br>
                @error('first_name')
                {{$message}}
                @enderror</br>
            </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">性別<span>※</span></label>
                <div class="contact-form__item-select">
                    <div class="contact-form__item--gender">
                        <input type="radio" name="gender" value="男性" checked>男性
                    </div>
                    <div class="contact-form__item--gender">
                        <input type="radio" name="gender" value="女性">女性
                    </div>
                    <div class="contact-form__item--gender">
                        <input type="radio" name="gender" value="その他">その他
                    </div>
                </div>
                </br>
                @error('gender')
                {{$message}}
                @enderror</br>
                </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">メールアドレス<span>※</span></label>
                <input class="contact-form__item-input" type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
                </br>
                @error('email')
                {{$message}}
                @enderror</br>
            </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">電話番号<span>※</span></label>
                <div class="contact-form__item--tel">
                    <input class="contact-form__item--tel-num" type="tel" name="no1" id="no1" placeholder="080" value="{{old('no1')}}">
                </div>
                <div class="contact-form__item--tel">
                    <input class="contact-form__item--tel-num" type="tel" name="no2" id="no2" placeholder="1234" value="{{old('no2')}}">
                </div>
                <div class="contact-form__item--tel">
                    <input class="contact-form__item--tel-num" type="tel" name="no3" id="no3" placeholder="5678" value="{{old('no3')}}">
                </div>
                <!-- <input type="hidden" name="tel" id="tel">
            ↑使い方調べる。エラーを一つにしたい -->
                </br>
                @error('no1')
                {{$message}}
                @enderror</br>
                @error('no2')
                {{$message}}
                @enderror</br>
                @error('no3')
                {{$message}}
                @enderror</br>
            </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">住所<span>※</span></label>
                <input class="contact-form__item-input" type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                </br>
                @error('address')
                {{$message}}
                @enderror</br>
                </div>
                <div class="contact-form__row">
                <label class="contact-form__item-label">建物名</label>
                <input class="contact-form__item-input" type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
                </br>
            </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">お問い合わせの種類<span>※</span></label>
                <div class="contact-form__item--select">
                    <select class="contact-form__item--category"name="category_id">
                        <option value="" selected hidden>選択してください</option>    
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['content']}}</option>
                        @endforeach
                    </select>
                </div>
                </br>
                @error('category')
                {{$message}}
                @enderror</br>
            </div>
            <div class="contact-form__row">
                <label class="contact-form__item-label">お問い合わせ内容<span>※</span></label>
                <textarea class="contact-form__item-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                </br>
                @error('detail')
                {{$message}}
                @enderror</br>
            </div>
            <button class="contact-form__button-submit"type="submit">確認画面</button>
        </form>
    </div>
</div>
@endsection('content')