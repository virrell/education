<?php namespace Education\Presenter\Post;

interface PostPresenterInterface{

    public function postsListViewModel($posts);
    public function createPostFormViewModel();
    public function editPostViewModel($post);
}