<ul class="menu">
	
	@foreach(content()->global_navigation() as $item)

		<li><a href="{{url( $item->is_homepage() ? '' : $item->path())}}">{{$item->title()}}</a></li>

	@endforeach

</ul>

