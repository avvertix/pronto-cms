<ul class="menu">
	
	@foreach(content()->menu() as $item)

		<li><a href="{{$item->path()}}">{{$item->title()}}</a></li>

	@endforeach

</ul>

