@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact">
    <h2>Contact</h2>
    <form class="" action="{{route('contact.confirm')}}" method="POST">
        @csrf
        <label class="">お名前<span>※</span></label>
        <input class="" type="text" name='last_name' placeholder="例：山田" value="{{old('last_name')}}">
        <input class="" type="text" name='first_name' placeholder="例：太郎" value="{{old('first_name')}}">
        @error('last_name')
        {{$message}}
        @enderror</br>
        @error('first_name')
        {{$message}}
        @enderror</br>
        <label class="">性別<span>※</span></label>
        <input type="radio" name="gender" value="男性" checked>男性
        <input type="radio" name="gender" value="女性">女性
        <input type="radio" name="gender" value="その他">その他
        </br>
        @error('gender')
        {{$message}}
        @enderror</br>
        <label class="">メールアドレス<span>※</span></label>
        <input type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
        </br>
        @error('email')
        {{$message}}
        @enderror</br>
        <label class="">電話番号<span>※</span></label>
        <input type="tel" name="no1" id="no1" placeholder="080" value="{{old('no1')}}">
        <input type="tel" name="no2" id="no2" placeholder="1234" value="{{old('no2')}}">
        <input type="tel" name="no3" id="no3" placeholder="5678" value="{{old('no3')}}">
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
    
        <label class="">住所<span>※</span></label>
        <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
        </br>
        @error('address')
        {{$message}}
        @enderror</br>
        <label class="">建物名</label>
        <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
        </br>
        <label class="">お問い合わせの種類<span>※</span></label>
        <select name="category_id">
            <option value="" selected hidden>選択してください</option>    
            @foreach($categories as $category)
            <option value="{{$category['id']}}">{{$category['content']}}</option>
            @endforeach
        </select>
        </br>
        @error('category')
        {{$message}}
        @enderror</br>
        <label class="">お問い合わせ内容<span>※</span></label>
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
        </br>
        @error('detail')
        {{$message}}
        @enderror</br>
        <button type="submit">確認画面</button>
    </form>


</div>
@endsection('content')