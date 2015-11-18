<ul class="menu">
	
	@foreach(content()->menu() as $item)

		<li><a href="{{$item->link_to()}}">{{$item->title()}}</a></li>

	@endforeach

</ul>

