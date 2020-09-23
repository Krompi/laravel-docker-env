@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Articles</h2>
	        </div>

            @foreach ($articles as $article)
            <h3><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
            <p>{{ $article->excerpt }}</p>
            @endforeach

		</div>
	</div>
</div>
@endsection