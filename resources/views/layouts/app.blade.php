<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div class="container-fluid">
         @include('includes.header')
    </div>
    @yield('main')
    <footer class="page-footer font-small blue">

       @include('includes.footer')

    </footer>
</body>
</html>
