<?php namespace Education\Presenter\Post;

class PostPresenter implements PostPresenterInterface{

    public function postsListViewModel($posts)
    {
        $postsForRendering = [];

        foreach ($posts as $post) {

            $user = $post->user()->first();
            
            $PostcardViewModel = [
                'id' => $post->id,
                'content' => $post->post_content,
                'createTime' => $post->created_at,
                'updateTime' => $post->updated_at,
                'userAvatar' => $user->profile_photo_url,
                'userName' => $user->name,
                'isEditable' => $post->isBelongToAuthUser(),
            ];
            array_push($postsForRendering, $PostcardViewModel);
        }

        return ['viewModel' => $postsForRendering];
    }

    public function createPostFormViewModel()
    {
        $this->CreatePostViewModel['actionRoute'] = route('post.store');
        return ['viewModel' => $this->CreatePostViewModel];
    }

    public function editPostViewModel($post)
    {
        return ['viewModel' => $this->createPostViewModel($post)];
    }

    private $CreatePostViewModel = [
        'contentFieldName' => 'content-field',
        'postContent' => '',
        'actionRoute' => '',
        'postId' => '',
    ];

    private function createPostViewModel($post)
    {   $CreatePostViewModel = $this->CreatePostViewModel;
        $CreatePostViewModel['postContent'] = $post->post_content;
        $CreatePostViewModel['actionRoute'] = route('post.update', $post->id);
        $CreatePostViewModel['postId'] = $post->id;
        return $CreatePostViewModel;
    }

}