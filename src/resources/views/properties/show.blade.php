@extends('layouts.template')

@section('content')
    <h1>賃貸詳細</h1>

    <p class="prop_id">No.{{ $properties->id }}</p>
    <p>物件名：{{ $properties->properties_name }}</p>
    <p>住所：{{ $properties->address }}</p>
    <p>築年数：{{ $properties->building_age }}</p>
    <p>賃料：{{ $properties->rent }}</p>
    <button type="button" onClick="history.back()">戻る</button>

    <script>
        const propId = document.querySelector('.prop_id').innerHTML;
        console.log(propId);
    </script>
    <br>
    <br>
    <h1>お問い合わせフォーム</h1>
    <form action="/store" method="post">
        @csrf
        <table>
            <tr>
                <td>氏名</td>
                <td><input name="name" placeholder="鈴木 太郎" required></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input name="email" type="email" placeholder="abc@abc.com" required></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><input name="tel" type="tel" placeholder="0000-000-000" required></td>
            </tr>
            <tr>
                <td>物件名</td>
                <td><input name="properties_name" class="search" placeholder="ハイツ西中島" required></td>
            </tr>
            <tr>
                <td>お問い合わせ内容</td>
                <td>
                    <textarea name="content" col="30" rows="10" placeholder="物件の詳細を教えてください" required></textarea>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
@endsection
