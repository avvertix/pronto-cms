@extends('global')


@section('main')

<div class="container">
	
	@if(isset($content))
		{!! $content !!}
	@endif

</div>

@endsection