<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Leave a Comment</h2>
    <a href="javascript:history.back()" class="btn btn-primary mb-3">Back</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('addComment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="post_id">Select Post:</label>
            <select class="form-control" id="post_id" name="post_id" required>
                <option value="">-- Select Post --</option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Enter your comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Display the post and its comments in a table -->
    @if ($selectedPost)
    <div class="mt-5">
        <h4>Post Details and Comments</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Comment</th>
                    <th>Commented At</th>
                </tr>
            </thead>
            <tbody>
                <!-- Post row -->
                <tr>
                    <td colspan="3">
                        <strong>{{ $selectedPost->title }}</strong><br>
                        {{ $selectedPost->content }}
                    </td>
                </tr>
                <!-- Comments for the post -->
                @if ($selectedPost->comments->isNotEmpty())
                    @foreach ($selectedPost->comments as $comment)
                        <tr>
                            <td></td> <!-- Empty cell for alignment -->
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No comments available for this post.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

