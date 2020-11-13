<?php namespace Education\Repo;

use Education\Repo\Post\PostInterface;
use Education\Repo\Post\EloquentPost;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind(PostInterface::class,function(){
            return new EloquentPost;
        });
    }
}
