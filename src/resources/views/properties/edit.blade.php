@extends('layouts.template')

@section('content')
    <h1>賃貸編集</h1>

    <form action="{{ route('editConfirm', $selected_property) }}" method="post">
        @csrf
        {{-- @method('patch') --}}
        <table>
            <tr>
                <td>物件名</td>
                <td>
                    <input name="name" value="{{ $selected_property->properties_name }}">
                </td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input name="address" value="{{ $selected_property->address }}"></td>
            </tr>
            <tr>
                <td>築年数</td>
                <td>

                    <input name="age" value="{{ $selected_property->building_age }}">
                </td>
            </tr>
            <tr>
                <td>賃料</td>
                <td>
                    <input name="rent" value="{{ $selected_property->rent }}">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="button">送信する</button></td>
            </tr>
            <br>
        </table>
    </form>
