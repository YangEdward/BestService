<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body data-spy="scroll" data-target="#myScrollSpy">

@include('includes.header')

<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-md-9">
            @yield('content')
        </div>
        <div class="col-md-3">
            @include('includes.affix')
        </div>
    </div>
    @include('includes.footer')
</div>

{{ HTML::script('js/jquery-2.1.3.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>