<h1>{{ $post->title }}</h1>

<p>{{ $post->content }}</p>

<a href="{{ route('posts.index') }}">Back</a>
@include('stuffs.comment')
@foreach($comments as $comment)
<p>{{ Str::limit($comment->comment, 10) }}</p>
@endforeach