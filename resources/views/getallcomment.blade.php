<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment ALL HOW HERE</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>All comment Show</h2>
    <a href="javascript:history.back()" class="btn btn-primary mb-3">Back</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>Post name</th>
                <th>comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->post->title }}</td> <!-- Displaying post name -->
                    <td>{{ $comment->comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>