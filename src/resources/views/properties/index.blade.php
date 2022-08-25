@extends('layouts.template')

@section('content')
    <div class="confirm"></div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="card-header">詳細検索</div>
    <div class="card-body">
        <form id="form" method="post">
            <div class="col-md-4">IDを入力:</div>
            <div class="col-md-4">
                <input name="id" id="id_number" type="number">
            </div>
        </form>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <button id="ajax_show" class="btn btn-info text-white">詳細ボタン</button>
        </div>
    </div>
    <!-- 取得したレコードを表示 -->
    <div class="col-md-12" id="result"></div>


    <div class="display-none result">
        <div class="property-id">
            id:<span></span>
        </div>
        <div class="property-name">
            物件名:<span></span>
        </div>
    </div>
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
                    <td><a href="properties/edit/{{ $propertie->id }}"><button class="btn btn-primary">編集</button></a></td>
                    <td><a href=" {{ route('delete', $propertie->id) }}"><button type="button"
                                class="btn btn-danger">削除</button></td>
                    <td>{{ $propertie->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="../js/ajax.js"></script>
@endsection
