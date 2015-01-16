
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ HTML::style('/css/bootstrap.min.css') }}
    {{ HTML::style('/dist/css/formValidation.min.css') }}

    {{ HTML::script('/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('/js/bootstrap.min.js') }}
    {{ HTML::script('/dist/js/formValidation.min.js') }}
    {{ HTML::script('/dist/js/framework/bootstrap.min.js') }}

    <style>
        body{
            padding-top: 70px;
        }
         textarea {
             resize: none;
         }
    </style>
</head>
<body>
@include('includes.header')
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
</div>
</body>
</html>