
@foreach($menu as $element)

	<h3 class="group">{{$element['name']}}</h3>
	
	<ul class="no-style">
		
		@foreach($element['child'] as $child)
		
			<li><a href="{{route('page', ['section' => $child['section'], 'page' => $child['page']])}}">{{$child['name']}}</a></li>
		@endforeach
	</ul>

@endforeach
