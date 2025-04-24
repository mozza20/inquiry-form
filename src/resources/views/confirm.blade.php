@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <h2>Confirm</h2>
    <div class="contact-table">
        <form action="{{route('contact.store')}}" method="POST">
            @csrf
            <table class="confirm-table__inner">
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">お名前</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="name" value="{{$formData['last_name']}}　{{$formData['first_name']}}" readonly> 
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">性別</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="gender" value="{{$formData['gender']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">メールアドレス</label>
                    <td>
                        <input class="confirm-table__item-input" type="email" name="email" value="{{$formData['email']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">電話番号</label>
                    <td>
                        <input class="confirm-table__item-input" type="tel" name="tel" value="{{$formData['no1']}}{{$formData['no2']}}{{$formData['no3']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">住所</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="address" value="{{$formData['address']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">建物名</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="building" value="{{$formData['building']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">お問い合わせの種類</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="category_id" value="{{$formData['category_id']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <label class="confirm-table__item-label">お問い合わせ内容</label>
                    <td>
                        <input class="confirm-table__item-input" type="text" name="detail" value="{{$formData['detail']}}" readonly>
                    </td>
                </div>
                <div class="confirm-tabl__row">
                    <td>
                        <button type="submit" name="action" value="submit">送信</button>
                        <button type="submit" name="action" value="back">修正</button>
                    </td>
                </div>
            </table>
        </form>
    </div>
</div>
@endsection('content')