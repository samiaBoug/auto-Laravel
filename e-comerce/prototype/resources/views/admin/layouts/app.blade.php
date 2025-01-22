<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    @vite('resources/js/app.js')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
    @yield('content')
    </div>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
    @vite('resources/js/app.js')
</body>
</html>
