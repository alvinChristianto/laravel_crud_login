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

    @include('basefile.footer')

</body>
</html>
