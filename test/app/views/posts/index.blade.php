<h1>Toutes les Vies de merde</h1>
@foreach ($posts as $post)
	<h2>
		<a href="{{ URL::route("posts.view",$post->id)}}">
			{{"VDM : $post->id"}}
		</a>
	</h2>

	<p>{{$post->content}}</p>
	<p>{{$post->date}}</p>
	<p><strong>{{$post->author}}</strong></p>
	<hr>
@endforeach