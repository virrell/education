<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $CreatePostViewModel = [
        'contentFieldName' => 'content-field',
        'postContent' => '',
        'actionRoute' => '',
        'postId' => '',

    ];

    public function createPost(Request $req)
    {
        $post = new Post();
        $post->post_content = $req->input($this->CreatePostViewModel['contentFieldName']);
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('dashboard');
    }

    public function deletePost($id)
    {   $post = Post::find($id);
        if ($this->isBelongToAuthUser($post))
        {
            $post->delete();
        }
        return redirect()->route('dashboard');
    }

    public function updatePost($id, Request $req)
    {
        $post = Post::find($id);
        $post->post_content = $req->input($this->CreatePostViewModel['contentFieldName']);
        $post->save();
        return redirect()->route('dashboard');
    }

    public function getAllPosts(Request $req)
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $postsForRendering = [];

        foreach ($posts as $post) {
            $user = User::find($post->user_id);

            $PostcardViewModel = [
                'id' => $post->id,
                'content' => $post->post_content,
                'createTime' => $post->created_at,
                'updateTime' => $post->updated_at,
                'userAvatar' => $user->profile_photo_url,
                'userName' => $user->name,
                'isEditable' => $this->isBelongToAuthUser($post),
            ];
            array_push($postsForRendering, $PostcardViewModel);
        }

        return view('dashboard', ['viewModel' => $postsForRendering]);
    }

    public function showPostUpdateForm($id)
    {
        $post = Post::find($id);

        if ($this->isBelongToAuthUser($post)) {
            $this->CreatePostViewModel['postContent'] = $post->post_content;
            $this->CreatePostViewModel['actionRoute'] = route('post-update', $id);
            $this->CreatePostViewModel['postId'] = $post->id;

            return view('posts.update-post', ['viewModel' => $this->CreatePostViewModel]);
        }
        return redirect()->route('dashboard');
    }

    public function showCreatePostForm()
    {
        $this->CreatePostViewModel['actionRoute'] = route('create-post');
        return view(
            'posts.create-post',
            [
                'viewModel' => $this->CreatePostViewModel,
            ]
        );
    }

    private function isBelongToAuthUser(Post $post)
    {
        return ($post->user_id === auth()->user()->id) ? true : false;
    }
}
