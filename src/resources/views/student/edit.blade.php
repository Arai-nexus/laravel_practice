@extends('layouts.template')

@section('content')
    <h1>生徒情報編集</h1>
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif
    <form action="{{ route('update', $student) }}" method="post">
        @csrf
        {{-- <input type="hidden" name="id2q value="{{ $student->id }}"> --}}
        <table>
            <tr>
                <td>氏名</td>
                <td><input name="name" value="{{ $student->name }}" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name="email" type="email" id="email" value="{{ $student->email }}" required></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td>
                    <input name="tel" type="tel" id="tel" value="{{ $student->tel }}" required>
                </td>
            </tr>
            <tr>
                <td>メッセージ</td>
                <td>
                    <input name="message" type="text" id="message" maxlength="31" value="{{ $student->message }}"
                        required>
                    <span class="text-counter">0</span>文字</div>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button" id="create-button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
@endsection
