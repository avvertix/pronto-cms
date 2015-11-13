@forelse(content()->sections() as $section)

	<div>
		<a href="{{$section->path()}}"><strong>{{$section->title()}}</strong></a>
		
	</div>

@empty 

	<p>
		No sections, no problem. Add a new section by adding a folder in the <code>storage/content</code> folder.
	</p>

@endforelse