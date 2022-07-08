@extends('layouts.template')

@section('content')
    <h1>賃貸詳細</h1>

    <p class="prop_id">No.{{ $properties->id }}</p>
    <p>物件名：{{ $properties->properties_name }}</p>
    <p>住所：{{ $properties->address }}</p>
    <p>築年数：{{ $properties->building_age }}</p>
    <p>賃料：{{ $properties->rent }}</div>
        <br>
        <br>
        <button type="button" onClick="history.back()">戻る</button>

        <script>
            const propId = document.querySelector('.prop_id').innerHTML;
            console.log(propId);
        </script>
    @endsection
