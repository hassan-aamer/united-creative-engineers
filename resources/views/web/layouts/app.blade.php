<!DOCTYPE html>
<html lang="en">

<head>
@include('web.layouts.head')
</head>

<body class="index-page">
    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')
    @include('web.layouts.js')
</body>

</html>
