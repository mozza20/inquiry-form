@extends('layouts.app')


@section('no_header')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <h2 class="thanks-message">お問い合わせありがとうございました</h2>
    <div class="thanks__background">
        <p class="thanks__background-text">Thank you</p>
    </div>
    <form action="/admin" method="GET">
        <button class="thanks__home-button">HOME</button>
    </form>
</div>
@endsection('content')