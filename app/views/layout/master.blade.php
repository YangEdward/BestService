<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

    @include('includes.header')
    @include('includes.carousel')
    @include('includes.collapse')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.footer')
    {{ HTML::script('js/jquery-2.1.3.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>