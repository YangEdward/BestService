
<!DOCTYPE html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
@include('admin.includes.header')
    <div class="container">

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
@yield('foot_script')
</body>
</html>