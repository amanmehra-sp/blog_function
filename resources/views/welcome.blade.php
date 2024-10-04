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
      <form class="form-inline my-2 my-lg-0" action="{{ route('searchPosts') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search title" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="container mt-4">
    <h2>All Posts</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created by</th>
                <th>Comment Add</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{route ('blog', $post->id)}}">{{ $post->title }}</a></td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                    <td>{{ $post->user->name }}</td> <!-- Displaying user name -->
                    <td>
                        <a class="nav-link" href="showcomment/{{$post->id}}">add comment <span class="sr-only">(current)</span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if($posts->isEmpty())
    <p>No results found for "{{ request()->input('query') }}"</p>
@else
<p>results found</p>
@endif
</body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>