<h1>Edit Comment</h1>

<form action="{{ route('comments.update', $comment) }}" method="POST">

    @csrf
    @method('PUT')

    <textarea name="comment">
        {{ $comment->comment }}
    </textarea>

    <br><br>

    <button type="submit">
        Update Comment
    </button>

</form>

<a href="{{ url()->previous() }}">Back</a>