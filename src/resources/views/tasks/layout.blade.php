<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  {{-- <link href="{{ asset('css/task.css') }}" rel="stylesheet"> --}}
</head>
<body>
<header>
  
</header>
<main>
  @yield('content')
</main>
{{-- @if(Auth::check()) --}}
  <script>
      // document.getElementById('logout').addEventListener('click', function(event) {
      //   event.preventDefault();
      //   document.getElementById('logout-form').submit();
      // });
  </script>
@endif
@yield('scripts')
</body>
</html>