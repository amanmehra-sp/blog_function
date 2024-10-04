<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{

    public function main()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('welcome', compact('posts')); // Pass posts to the view

    }

   public function blogview($id){

    //  $blog =  Post::with('comments')->where('id' , $id)->get();
     $blog =  Post::with('comments')->where('id', $id)->first();

     return view('blogview' ,compact('blog'));
   }

    public function usershow()
    {
        return view('user'); // Pass uer to the view
    }

    public function alluserget()
    {
        $users = User::all();
        return view('alluserget', compact('users')); // Pass alluerget to the view
    }

    public function allcomment()
    {

        $comments = Comment::all();
        return view('getallcomment', compact('comments')); // Pass allcomment to the view

    }
    public function viewshowcomment($id)
    {

        $posts = Post::all(); // Fetch all posts
        $users = User::all();
        return view('comment', compact('posts','users')); // Pass posts to the view

    }

    public function postshow()
    {

        $users = User::orderBy('id', 'desc')->get();
        return view('postadd', compact('users')); // Pass users to the view

    }

    public function allcommentlisting($id)
    {

        $comments = Comment::all();
        return view('lisstingallcomment', compact('comments')); // Pass allcomment to the view

    }

    public function adduser(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save(); // Save the user to the database

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function addpost(Request $request)
    {

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create a new post
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->save(); // Save the post to the database

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function addcomment(Request $request)
    {
        
        // Save the comment to the database (this assumes you have a Comment model)
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('success', 'Comment submitted successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Fetch posts that match the query
        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('body', 'LIKE', "%{$query}%")
            ->with('user') // Ensure you also fetch user data
            ->orderBy('id', 'desc')
            ->get();

        return view('welcome', compact('posts')); // Replace with your actual view name
    }
}