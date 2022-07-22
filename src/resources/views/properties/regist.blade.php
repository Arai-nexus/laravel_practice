@extends('layouts.template')

@section('content')
    <h1>賃貸登録</h1>

    <form action="{{ route('store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>物件名</td>
                <td><input name="name" placeholder="アイス" required></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input name="address" placeholder="" required></td>
            </tr>
            <tr>
                <td>築年数</td>
                <td>
                    <input name="age" placeholder="〇年" required>
                </td>
            </tr>
            <tr>
                <td>賃料</td>
                <td>
                    <input name="rent" placeholder="〇" required>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
@endsection
