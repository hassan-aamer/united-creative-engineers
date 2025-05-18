<!DOCTYPE html>
<html lang="en">

<head>
@include('web.layouts.head')
</head>

<body style="font-weight: bold;" class="index-page">
    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')
    @include('web.layouts.js')
</body>

</html>
