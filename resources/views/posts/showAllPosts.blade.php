<h1>All Posts</h1>

<a href="{{ route('posts.create') }}">Create Post</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@foreach($posts as $post)

    <h2>{{ $post->title }}</h2>

    <p>{{ Str::limit($post->content, 100) }}</p>

    <a href="{{ route('posts.show', $post) }}">View</a>

    <a href="{{ route('posts.edit', $post) }}">Edit</a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
    @include('auth.logout')

    <hr>

@endforeach