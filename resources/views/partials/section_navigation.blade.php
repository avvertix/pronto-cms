
@if(isset($section_menu))

@foreach ($section_menu as $se)
    
    {{ $se->metadata('TOCTitle', $se->title()) }}

    
@endforeach


@else 

No Navigation is set


@endif



