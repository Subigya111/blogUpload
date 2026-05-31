<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="mt-4">

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Comment -->
    @if(!$userComment)

        <div class="card mb-4 shadow-sm">

            <div class="card-body">

                <h5 class="mb-3">Add Comment</h5>

                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf

                    <textarea name="comment" class="form-control mb-3"
                        placeholder="Write your comment..."></textarea>

                    <button type="submit" class="btn btn-primary w-100">
                        Comment
                    </button>

                </form>

            </div>

        </div>

    @else

        <div class="alert alert-info">
            You already commented on this post.
        </div>

    @endif

    <!-- Comments List -->
    <h5 class="mb-3">Comments</h5>

    @foreach($comments as $comment)

        <div class="card mb-3">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <strong>{{ $comment->user->name }}</strong>

                    @if(auth()->id() == $comment->user_id)

                        <div class="d-flex gap-2">

                            <a href="{{ route('comments.edit', $comment) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('comments.delete', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>

                        </div>

                    @endif

                </div>

                <p class="mt-2 mb-0">
                    {{ $comment->comment }}
                </p>

            </div>

        </div>

    @endforeach

    <!-- Errors -->
    @if($errors->any())

        <div class="alert alert-danger mt-3">

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

</div>