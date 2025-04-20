@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <h2 class="">お問い合わせありがとうございました</h2>
    <form action="/admin" method="GET">
        <button class="">HOME</button>
    </form>
@endsection('content')