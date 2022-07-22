@extends('layouts.template')

@section('content')
    <h1>賃貸一覧</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>賃貸</th>
            </tr>
        </thead>
        <tbody>
            @if (session('flash_message'))
                <div class="flash_message">
                    {{ session('flash_message') }}
                </div>
            @endif
            <a href="{{ route('regist') }}"><button type="button">新規登録</button></a>
            @foreach ($properties as $propertie)
                <tr>
                    <td>{{ $propertie->properties_name }}</td>
                    <td>{{ $propertie->address }}</td>
                    <td>{{ $propertie->building_age }}</td>
                    {{-- <td><button type="button" href="{{ url('/show', $propertie->id) }}" class="btn btn-primary">詳細</a></td> --}}
                    <td><a href="properties/edit/{{ $propertie->id }}"><button class="btn btn-primary">編集</button></a></td>
                    <td><a href=" {{ route('delete') }}"><button type="button" class="btn btn-danger">削除</button></td>
                    <td>{{ $propertie->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
