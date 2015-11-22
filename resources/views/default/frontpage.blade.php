@extends('layout')


@section('main')

<div class="container">
	
	@if(isset($content))
		{!! $content !!}
	@endif
	
	
	@include('partials.sections')

</div>

@endsection