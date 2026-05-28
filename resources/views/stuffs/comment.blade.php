
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
@if(!$userComment)
<h1>Add Comment</h1>

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
@else

    <p>You already commented on this post.</p>

@endif
<h3>Comments</h3>

@foreach($comments as $comment)

    <p>
        <strong>{{ $comment->user->name }}:</strong>
        {{ $comment->comment }}
    </p>
    {{-- only current logged in user can edit or delete their own comment--}}
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