@forelse(content()->sections() as $section)

	<div class="grid grid--1of3 section-grid">
		
		<a href="{{$section->path()}}" class="grid-cell"><strong>{{$section->title()}}</strong></a>
		
	</div>

@empty 

	<p>
		No sections, no problem. Add a new section by adding a folder in the <code>storage/content</code> folder.
	</p>

@endforelse