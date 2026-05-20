<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">

    @csrf
    @method('PUT')

    <input 
        type="text" 
        name="title" 
        value="{{ $post->title }}"
    >

    <br><br>

    <textarea name="content">{{ $post->content }}</textarea>

    <br><br>

    <button type="submit">Update Post</button>

</form>
    <a href="{{ route('posts.index') }}">Back</a>

@if($errors->any())

    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif