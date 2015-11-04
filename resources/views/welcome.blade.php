@extends('global')


@section('main')

<div class="container">
	
	@if(isset($content))
		{!! $content !!}
	@endif

</div>

<div class="container">
{{var_dump($global_menu)}}
</div>

@endsection