@extends('layout')

@section('main')

<div class="container grid grid--gutters">

<div class="sidebar grid-cell u-1of3">
	@include('partials.section_navigation')
</div>

<div class="page-content grid-cell">

	@if(isset($page))
		{!! $page->toHtml() !!}
	@endif
	
</div>
	


</div>

@endsection