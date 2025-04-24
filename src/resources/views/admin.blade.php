@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
    <div class="header-nav">
        <form class="header-nav__button" action="{{route('logout')}}" method="POST">
            @csrf
            <button class="header-nav__button--logout" type="submit">logout</button>
        </form>
    </div>
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
        <form action="/csv-download" method="GET">
            <button type="submit">エクスポート</button>
        </form>
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
                        <button type="button" class="open-modal-btn"
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
                <table>
                    <tr><td>お名前</td><td id="modal-name"></td></tr>
                    <tr><td>性別</td><td id="modal-gender"></td></tr>
                    <tr><td>メール</td><td id="modal-email"></td></tr>
                    <tr><td>電話番号</td><td id="modal-tel"></td></tr>
                    <tr><td>住所</td><td id="modal-address"></td></tr>
                    <tr><td>建物名</td><td id="modal-building"></td></tr>
                    <tr><td>カテゴリ</td><td id="modal-category"></td></tr>
                    <tr><td>詳細内容</td><td id="modal-detail"></td></tr>
                </table>
                <form id="delete-form" method="POST" action="" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" id="delete-btn" class="delete-btn">削除</button>
        </form>
            </div>
        </div>

    </div>
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