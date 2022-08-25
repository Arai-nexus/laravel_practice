@extends('layouts.template')

@section('content')
    <h1>生徒一覧</h1>
    <div>
        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword">
            <input type="submit" value="検索">
        </form>
    </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (session('flash_message'))
                <div class="flash-message">
                    {{ session('flash_message') }}
                </div>
            @endif
            <a href="{{ route('create') }}"><button type="button">新規登録</button></a>
            @forelse ($students as $student)
                <tr>
                    {{-- <td>{{ $propertie->id }}</td> --}}
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->tel }}</td>
                    <td>{{ $student->message }}</td>
                    <td><a href="{{ route('edit', $student->id) }}"><button class="btn btn-danger">編集</button></a></td>
                    <td><a href="{{ route('delete', $student->id) }}"><button class="btn btn-danger">削除</button></a></td>
                </tr>
            @empty
                <td>検索条件に合う生徒がいません。</td>
            @endforelse
        </tbody>
    </table>
@endsection
