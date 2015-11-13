
@if(isset($navigation))


@foreach($navigation as $element)

	@if($element->is_group())

	<h3 class="group">{{$element->title()}}</h3>
	
		<ul>
		@foreach($element->childs() as $child)
	
			<li><a href="{{$child->link_to()}}">{{$child->title()}}</a></li>
	
		@endforeach
		</ul>
	
	@else
	
	<a href="{{$element->path()}}">{{$element->title()}}</a>
	
	@endif
	
	

@endforeach


@else 

No Navigation is set


@endif



