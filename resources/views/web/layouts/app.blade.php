<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('web.layouts.head')
</head>

<body class="bg-gray">
    @hasSection('header')
        @yield('header')
    @else
        @include('web.layouts.header')
    @endif
    @yield('content')
    @include('web.layouts.footer')
    @include('web.layouts.js')
</body>

</html>
