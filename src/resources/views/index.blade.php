@extends('layouts.css')

@section('content')
    <h1>賃貸一覧</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>賃貸</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $propertie)
                <tr>
                    <td>{{ $propertie->id }}</td>
                    <td>{{ $propertie->properties_name }}</td>
                    <td>{{ $propertie->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
