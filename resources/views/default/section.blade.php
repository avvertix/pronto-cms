@extends('layout')

@section('main')





<div class="container">
	
	
	<div class="sidebar">
		@include('partials.section_navigation')
	</div>
	
	
	@if(isset($content))
		{!! $content !!}
	@endif

</div>

@endsection