@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <h2>Confirm</h2>
    <div class="contact-table">
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">お名前</th>
                    <td>
                    <input class="confirm-table__item-input" type="text" name="name" value="{{$formData['last_name']}}　{{$formData['first_name']}}" readonly> 
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">性別</th>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="gender" value="{{$formData['gender']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">メールアドレス</th>
                    <td>
                        <input class="confirm-table__item-input" type="email" name="email" value="{{$formData['email']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">電話番号</th>
                    <td>
                        <input class="confirm-table__item-input" type="tel" name="tel" value="{{$formData['no1']}}{{$formData['no2']}}{{$formData['no3']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">住所</th>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="address" value="{{$formData['address']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">建物名</th>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="building" value="{{$formData['building']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">お問い合わせの種類</th>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="category_id" value="{{$categoryName}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__item-label">お問い合わせ内容</th>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="detail" value="{{$formData['detail']}}" readonly>
                    </td>
                </tr>
            </table>
            <div class="confirm-buttons">
                <button class="confirm-button__submit" type="submit" name="action" value="submit">送信</button>
                <button class="confirm-button__back" type="submit" name="action" value="back">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection('content')