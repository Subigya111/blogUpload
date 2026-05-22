<h1>Add Comment</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('comments.store') }}" method="POST">

    @csrf

    <textarea
        name="comment"
        placeholder="Write your comment..."></textarea>

    <br><br>

    <button type="submit">
         Comment
    </button>

</form>

@if($errors->any())

    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif