<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $req){
        $post = new Post();
        $post->post_content = $req->input('post-content');
        $post->save();

        return redirect()->route('posts');
    }

    public function deletePost($id){
        Post::find($id)->delete();
        return redirect()->route('posts');
    }

    public function updatePost($id, Request $req) {
        $post = Post::find($id);
        $post->post_content = $req->input('post-content');
        $post->save();
        return redirect()->route('posts');
    }

    public function getAllPosts(Request $req)
    {
        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        return view('post', ['data' => $post]);
    }
}
