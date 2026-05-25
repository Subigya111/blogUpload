<h1>Add Comment</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('comments.store',$post) }}" method="POST">

    @csrf

    <textarea
        name="comment"
        placeholder="Write your comment..."></textarea>

    <br><br>

    <button type="submit">
         Comment
    </button>

</form>
<h3>Comments</h3>

@foreach($comments as $comment)

    <p>
        <strong>{{ $comment->user->name }}:</strong>
        {{ $comment->comment }}
    </p>
    @if(auth()->id() == $comment->user_id)

        <a href="{{ route('comments.edit', $comment) }}">
            Edit
        </a>

        <form action="{{ route('comments.delete', $comment) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>

    @endif

    <hr>

@endforeach


@if($errors->any())

    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif