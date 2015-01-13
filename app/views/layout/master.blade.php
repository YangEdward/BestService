<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

    @include('includes.header')
    @include('includes.carousel')

    <div class="container">
        @yield('content')
        @include('includes.footer')
    </div>

    {{ HTML::script('js/jquery-2.1.3.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</body>
</html>