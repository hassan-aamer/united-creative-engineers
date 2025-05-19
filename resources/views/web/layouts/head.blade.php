    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ setting('name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('web.layouts.css')
    @yield('css')
