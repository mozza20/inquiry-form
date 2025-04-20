@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="contact">
    <h2>Confirm</h2>
    <form class="" action="{{route('contact.store')}}" method="POST">
        @csrf
        <table class="">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="name" value="{{$formData['last_name']}}　{{$formData['first_name']}}" readonly> 
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <input type="text" name="gender" value="{{$formData['gender']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="email" name="email" value="{{$formData['email']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="tel" name="tel" value="{{$formData['no1']}}{{$formData['no2']}}{{$formData['no3']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address" value="{{$formData['address']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input type="text" name="building" value="{{$formData['building']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <input type="text" name="category_id" value="{{$formData['category_id']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <input type="text" name="detail" value="{{$formData['detail']}}" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="action" value="submit">送信</button>
                    <button type="submit" name="action" value="back">修正</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection('content')