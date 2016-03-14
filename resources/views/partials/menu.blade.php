<ul class="menu">
	
	@foreach(content()->global_navigation() as $item)

		<li><a href="{{url($item->path())}}">{{$item->title()}}</a></li>

	@endforeach

</ul>

