<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Modal Window</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
</head>
<body>
    <table>
        <tr>
        <td>お名前</td>
        <td>{{$contact['last_name']."　".$contact['first_name']}}</td>
        </tr>
        <tr>
            <td>性別</td>
            <td>{{ $contact->gender }}</td>
        </tr>
        <tr>
            <td>メール</td>
            <td>{{ $contact->email }}</td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td>{{ $contact->no1 }}{{ $contact->no2 }}{{ $contact->no3 }}</td>
        </tr>
        <tr>
            <td>住所</td>
            <td>{{ $contact->adress }}</td>
        </tr>
        <tr>
            <td>建物名</td>
            <td>{{ $contact->building }}</td>
        </tr>
        <tr>
            <td>カテゴリ</td>
            <td>{{ $contact->category->content }}</td>
        </tr>
            <td>詳細内容</td>
            <td>{{ $contact->detail }}</td>
        </td>
    </table>
    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
</body>
</html>