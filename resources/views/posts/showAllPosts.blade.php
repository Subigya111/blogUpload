<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Posts</h2>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            + Create Post
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Posts -->
    @foreach($posts as $post)

        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <h4 class="card-title">{{ $post->title }}</h4>

                <p class="card-text text-muted">
                    {{ Str::limit($post->content, 120) }}
                </p>

                <div class="d-flex gap-2">

                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info text-white">
                        View
                    </a>

                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>

                </div>

            </div>
        </div>

    @endforeach

    <!-- Logout (move OUTSIDE loop — important fix) -->
    <div class="mt-4">
        @include('auth.logout')
    </div>

</div>