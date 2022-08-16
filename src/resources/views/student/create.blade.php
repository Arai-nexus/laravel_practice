@extends('layouts.template')

@section('content')
    <h1>生徒登録</h1>
    <div class="err-msg-name">
    </div>
    <form action="{{ route('store') }}" id="form" method="post">
        @csrf
        <table>
            <tr>
                <td>氏名</td>
                <td><input name="name" id="name" placeholder="山田　太郎" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name="email" type="email" id="email" placeholder="abc@abc.com" required></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td>
                    <input name="tel" type="tel" id="tel" placeholder="000-0000-0000" required>
                    <span>※ハイフンは使用せずに記載ください。</span>
                </td>
            </tr>
            <tr>
                <td>メッセージ</td>
                <td>
                    <input name="message" type="text" id="message" placeholder="30字以内" required>
                    <span class="text-counter">0</span>文字</div>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button" id="button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
@endsection
