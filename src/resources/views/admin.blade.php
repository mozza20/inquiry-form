@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
    <!-- <div class="header-nav"> -->
        <form class="header-nav__button" action="{{route('logout')}}" method="POST">
            @csrf
            <button class="header-nav__button--logout" type="submit">logout</button>
        </form>
    <!-- </div> -->
@endsection

@section('content')
<div class="admin">
    <h2>Admin</h2>
    <div class="search-form">
        <form class="search-form__inner" action="{{route('admin.search')}}" method="GET">
        @csrf
            <input class="search__keyword" type="text" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">

            <select class="search__gender" name="gender">
                <option value="性別" selected hidden>性別</option>
                <option value="全て">全て</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>

            <select class="search__category" name="category_id" id="">
                <option value="" selected hidden>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['content']}}</option>
                @endforeach
            </select>

            <input class="search__date" type="date" name="date">

            <button class="search-button--search" type="submit" name="action" value="search" >検索</button>
            <button class="search-button--reset" type="submit" name="action" value="reset">リセット</button>
        </form>
    </div>
    <div class="under-search-form">
        <div class="export-button">
            <form class="export-button__inner" action="/csv-download" method="GET">
                <button class="export-button--submit" type="submit">エクスポート</button>
            </form>
        </div>
        <div class="pagination">
            {{$contacts->links('pagination::bootstrap-4')}}
        </div>
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
                        <button class="open-modal-btn" type="button" 
                            data-id="{{ $contact->id }}"
                            data-name="{{ $contact->last_name }}　{{ $contact->first_name }}"
                            data-gender="{{ $contact->gender }}"
                            data-email="{{ $contact->email }}"
                            data-tel="{{ $contact->no1 }}{{ $contact->no2 }}{{ $contact->no3 }}"
                            data-address="{{ $contact->address }}"
                            data-building="{{ $contact->building }}"
                            data-category="{{ $contact->category->content }}"
                            data-detail="{{ $contact->detail }}">
                            詳細
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </form>
        <!-- モーダルウィンドウ -->
        <div id="modal" class="modal hidden">
            <div class="close-button">
                <button id="close-modal">×</button>
            </div>
            <div class="modal-content">
                <table class="modal-content__table">
                    <tr class="modal-content__row">
                        <td class="modal-content__label">お名前</td>
                        <td class="modal-content__text" id="modal-name"></td></tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">性別</td>
                        <td class="modal-content__text" id="modal-gender"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">メール</td>
                        <td class="modal-content__text" id="modal-email"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">電話番号</td>
                        <td class="modal-content__text" id="modal-tel"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">住所</td>
                        <td class="modal-content__text" id="modal-address"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">建物名</td>
                        <td class="modal-content__text" id="modal-building"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">カテゴリ</td>
                        <td class="modal-content__text" id="modal-category"></td>
                    </tr>
                    <tr class="modal-content__row">
                        <td class="modal-content__label">詳細内容</td>
                        <td class="modal-content__text" id="modal-detail"></td>
                    </tr>
                </table>
                <form class="modal_delete" id="delete-form" method="POST" action="{{route('admin')}}">
                @csrf
                @method('DELETE')
                    <button class="delete-btn" type="submit" id="delete-btn" >削除</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- JavaScript -->
@section('scripts')
<script>
document.querySelectorAll('.open-modal-btn').forEach(button => {
    button.addEventListener('click', function () {
        document.getElementById('modal-name').innerText = this.dataset.name;
        document.getElementById('modal-gender').innerText = this.dataset.gender;
        document.getElementById('modal-email').innerText = this.dataset.email;
        document.getElementById('modal-tel').innerText = this.dataset.tel;
        document.getElementById('modal-address').innerText = this.dataset.address;
        document.getElementById('modal-building').innerText = this.dataset.building;
        document.getElementById('modal-category').innerText = this.dataset.category;
        document.getElementById('modal-detail').innerText = this.dataset.detail;
        // 削除アクションの設定
        const contactId = this.dataset.id;
        const deleteForm = document.getElementById('delete-form');
        deleteForm.action = `/contacts/${contactId}`;

        document.getElementById('modal').classList.remove('hidden');
    });
});

document.getElementById('close-modal').addEventListener('click', function () {
    document.getElementById('modal').classList.add('hidden');
});
</script>
@endsection
</div>