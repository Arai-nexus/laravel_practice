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
            @foreach ($properties as $propertie)
                <tr>
                    {{-- <td>{{ $propertie->id }}</td> --}}
                    <td>{{ $propertie->properties_name }}</td>
                    <td>{{ $propertie->address }}</td>
                    <td>{{ $propertie->building_age }}</td>
                    <td>{{ $propertie->created_at }}</td>
                    <td><a href="{{ url('/show', $propertie->id) }}" class="btn btn-primary">詳細</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
