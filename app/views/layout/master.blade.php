<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

    @include('includes.header')

    <div class="container" style="margin-top: 70px">
        @if(Session::has('notice'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{ Session::get('notice') }}</p>
                {{Session::forget('notice')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{ Session::get('error') }}</p>
                {{Session::forget('error')}}
            </div>
        @endif
        @if(Session::has('alert'))
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{ Session::get('alert') }}</p>
                {{Session::forget('alert')}}
            </div>
        @endif
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
    @yield('foot_script')
</body>
</html>