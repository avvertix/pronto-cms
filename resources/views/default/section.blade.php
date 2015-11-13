@extends('layout')

@section('main')

<div class="container">

<div class="sidebar">
	@include('partials.section_navigation')
</div>

<div class="page-content">

	@if(isset($content))
		{!! $content !!}
	@endif

<pre><code>{{var_dump($navigation)}}</code></pre>
	
</div>
	


</div>

@endsection