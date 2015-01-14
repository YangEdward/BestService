<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

    @include('includes.header')

    <div class="container" style="margin-top: 70px">
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