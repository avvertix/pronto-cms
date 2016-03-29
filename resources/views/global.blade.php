<!DOCTYPE html>
<html><head>
<title>@if(isset($page_title)) {{$page_title}} - @endif {{config('pronto.site_title')}}</title>
<meta charset="utf-8" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700,200italic,400italic,700italic">

<link rel="stylesheet" href="{{url('css/app.css')}}">

</head>
<body>
        
    @yield('header')
        
    @yield('main')
        
    @yield('footer')
        
    <script src="{{url('js/highlight.js')}}"></script>

</body></html>