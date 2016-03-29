@extends('layout')

@section('main')

<div class="container flex">

@include('partials.section_navigation')

<div class="page-content">

	@if(isset($page))
		{!! $page->toHtml() !!}
	@endif
	
</div>
	


</div>

@endsection