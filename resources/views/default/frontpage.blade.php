@extends('layout')


@section('main')

<div class="container">
	
	@if(isset($page))
		{!! $page->toHtml() !!}
	@endif
	
	
	@include('partials.sections')

</div>

@endsection