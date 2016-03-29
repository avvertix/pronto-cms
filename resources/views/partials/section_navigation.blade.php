
@if(isset($section_menu) && !$section_menu->isEmpty())

    <div class="sidebar col col--3">

        @foreach ($section_menu as $se)
            
            {{ $se->metadata('TOCTitle', $se->title()) }}

        @endforeach

    </div>

@endif
