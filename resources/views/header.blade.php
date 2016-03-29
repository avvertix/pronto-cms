
<header>
	
	<div class="container flex flex--between flex--middle">
	
		<a href="{{route('home')}}" class="title">{{config('pronto.site_title')}}</a>
		
		<nav role="navigation" class="main-navigation col col--6">
			@include('partials.menu')	
		</nav>
	
	</div>
</header>
