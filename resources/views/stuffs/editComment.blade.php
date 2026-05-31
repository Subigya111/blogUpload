<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body">

                    <h4 class="text-center mb-4">Edit Comment</h4>

                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Comment</label>

                            <textarea name="comment" class="form-control" rows="5">{{ $comment->comment }}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Update Comment
                        </button>

                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                            ← Back
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>