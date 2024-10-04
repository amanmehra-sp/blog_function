<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="userform">Add New User <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="showpost">Create New Post <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="getall">All User listing <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="getallcomment"> All Comment listing<span class="sr-only">(current)</span></a>
          </li>
      </ul>
     </div>
    </nav>
    <div class="container">
    <div class="row">
        <h1>{{$blog->title}}</h1>
        <h3>{{$blog->body}}</h3>
        <ul>
        @foreach ($blog->comments as $post)
            <li>{{$post->comment}}</li>
        @endforeach
    </ul>
    </div>
    </div>

    <div class="container mt-5">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        <!-- Comment Form -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-4">Leave a Comment</h4>
                
                <form action="{{ route('addComment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$blog->id}}"> <!-- Assuming you are passing $postId -->
    
                    <div class="form-group mb-3">
                        <label for="comment" class="form-label">Your Comment:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Type your comment here..." required></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>