<?php

namespace Education\Repo\Post;

use App\Models\Post;

class EloquentPost implements PostInterface
{
    public function byId($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function create(array $data)
    {
        $post = new Post();
        $post->post_content = $data['post_content'];
        $post->user_id = $data['user_id'];
        return $post->save();
    }

    public function update(array $data)
    {
        $post = $this->byId($data['id']);
        $post->post_content = $data['post_content'];
        return $post->save();
    }

    public function deleteById($id)
    {
        $post = $this->byId($id);
        return $post->delete();
    }

    public function getAllPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return $posts;
    }
}
