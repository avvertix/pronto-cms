@extends('layout')


@section('main')

<div class="container">
	
	@if(isset($content))
		{!! $content !!}
	@endif
	
	
	<hr/>
	
	@include('partials.sections')

</div>

@endsection