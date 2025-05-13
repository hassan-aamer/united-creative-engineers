<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('admin.layouts.head')
</head>

<body
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>
    <div id="wrapper">
        @include('admin.layouts.main-header')
        @include('admin.layouts.main-sidebar')
        @yield('content')
    </div>
    @include('admin.layouts.right-sidebar')
    <div class="rightbar-overlay"></div>
    @include('admin.layouts.footer')
</body>

</html>
