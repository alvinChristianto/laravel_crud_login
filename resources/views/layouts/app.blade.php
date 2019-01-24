<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('basefile.head')
</head>
<body>
    <div class="container-fluid">
         @include('basefile.header')
    </div>
    @yield('main')
    <footer class="page-footer font-small blue">

       @include('basefile.footer')

    </footer>
</body>
</html>
