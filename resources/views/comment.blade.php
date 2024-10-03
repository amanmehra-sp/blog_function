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
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>