<p><a href="{{ URL::route("posts.index") }}">Back</a></p>
	<h1>{{"VDM : $posts->id"}}</h1>

	<p>{{$posts->content}}</p>
	<p>{{$posts->date}}</p>
	<p><strong>{{$posts->author}}</strong></p>
	<hr>
