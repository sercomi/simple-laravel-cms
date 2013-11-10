<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>@yield('title', Config::get('cms.sitename') )</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    {{ HTML::style('/css/styles.css')}}
    {{ HTML::style('/css/font-awesome.min.css')}}
    {{ HTML::style('/css/markdown-editor.css')}}
    {{ HTML::style('/css/admin.css')}}
    @yield('styles')
</head>
<body>
    @include('templates.adminnavbar')

    @include('templates.flashMessage')

    @yield('content')

    {{ HTML::script('/js/jquery.min.js') }}
    {{ HTML::script('/js/bootstrap.min.js') }}
    {{ HTML::script('/js/vendor/pagedown-bootstrap/Markdown.Converter.js') }}
    {{ HTML::script('/js/vendor/pagedown-bootstrap/Markdown.Sanitizer.js') }}
    {{ HTML::script('/js/vendor/pagedown-bootstrap/Markdown.Editor.js') }}

    @yield('scripts')
</body>
</html>
