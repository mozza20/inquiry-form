@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin">
    <h2>Admin</h2>
    <div class="search-form">
        <form class="search-form__inner" action="{{route('admin.search')}}" method="GET">
        @csrf
            <tr>
                <td>
                    <input type="text" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">
                </td>
                <td>
                    <select name="gender">
                    <option value="性別" selected hidden>性別</option>
                    <option value="全て">全て</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                    </select>
                </td>
                <td>
                    <select name="category_id" id="">
                        <option value="" selected hidden>お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['content']}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="date" name="date">
                </td>
                <td>
                    <button type="submit" name="action" value="search" >検索</button>
                    <button type="submit" name="action" value="reset">リセット</button>
                </td>
            </tr>
        </form>
    </div>
    <div class="export-button">
        <a href=" " download="">エクスポート</a>
    </div>
    <div class="pagination">
        {{$contacts->links()}}
    </div>
    <div class="contact-lists">
        <form class="contact-lists__inner" action="" method="get">
            <table class="contact-table">
                <tr class="contact-table__headline">
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="contact-table__contents">
                    <td>{{$contact['last_name']."　".$contact['first_name']}}</td>
                    <td>{{$contact['gender']}}</td>
                    <td>{{$contact['email']}}</td>
                    <td>{{$contact->category->content}}</td>
                    <td>
                        <button type="submit">詳細</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </form>
    </div>
</div>
@endsection('content')