<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('frontend.partials._metas')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    @yield('styles')
</head>

<body>
    <div id="container--main">
        @yield('content')
    </div>
</body>
@yield('scripts')

</html>
