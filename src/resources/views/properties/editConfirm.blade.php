@extends('layouts.template')

@section('content')
    <h1>編集確認画面</h1>

    <form action="{{ route('editComplete', $id) }}" method="post">
        @csrf
        {{-- @method('patch') --}}
        <table>
            <tr>
                <td>物件名</td>
                <td>
                    {{ $test->name }}
                    <input type="hidden" name="name" value="{{ $test->name }}">
                </td>
            </tr>
            <tr>
                <td>住所</td>
                <td>{{ $test->address }}
                    <input type="hidden" name="address" value="{{ $test->address }}">
                </td>
            </tr>
            <tr>
                <td>築年数</td>
                <td>
                    {{ $test->age }}
                    <input type="hidden" name="age" value="{{ $test->age }}">
                </td>
            </tr>
            <tr>
                <td>賃料</td>
                <td>
                    {{ $test->rent }}
                    <input type="hidden" name="rent" value="{{ $test->rent }}">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button" id="button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
    <script>
        const button = document.querySelector('#button');
        button.addEventListener("click", function(e) {
            confirm('送信しますか？') ? '' : e.preventDefault();
        })
    </script>
@endsection
