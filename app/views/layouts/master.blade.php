<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>@yield('title', Config::get('cms.sitename') )</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    {{ HTML::style('/css/styles.css')}}
    @yield('styles')
</head>
<body>
    @yield('content')

    @include('templates.footer')
    {{ HTML::script('/js/jquery.min.js') }}
    {{ HTML::script('/js/bootstrap.min.js') }}
    @yield('scripts')
</body>
</html>
