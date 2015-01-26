<!-- Basic Page Needs
		================================================== -->
<meta charset="utf-8" />
<title>
    @section('title')
        Laravel 4 Sample Site
    @show
</title>
@section('meta_keywords')
    <meta name="keywords" content="your, awesome, keywords, here" />
@show
@section('meta_author')
    <meta name="author" content="Jon Doe" />
@show
@section('meta_description')
    <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />
    @show
            <!-- Mobile Specific Metas
		================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
		================================================== -->
{{ HTML::style('/css/bootstrap.min.css') }}
{{ HTML::style('/dist/css/formValidation.min.css') }}
{{ HTML::style('/css/font-awesome.min.css') }}
{{--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
    @yield('styles')
<style>
    body{
        padding-top: 70px;
    }
    textarea {
        resize: none;
    }
</style>
    <!-- script
            ================================================== -->
    {{ HTML::script('/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('/js/bootstrap.min.js') }}
    {{ HTML::script('/dist/js/formValidation.min.js') }}
    {{ HTML::script('/dist/js/framework/bootstrap.min.js') }}