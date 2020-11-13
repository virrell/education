<?php namespace Education\Presenter;


use Education\Presenter\Post\PostPresenterInterface;
use Education\Presenter\Post\PostPresenter;
use Illuminate\Support\ServiceProvider;

class PresenterServiceProvider extends ServiceProvider{
    public function register(){

        $this->app->bind(PostPresenterInterface::class, function(){
            return new PostPresenter;
        });
    }
}
