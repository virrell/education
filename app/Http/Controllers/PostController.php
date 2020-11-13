<?php

namespace App\Http\Controllers;

use Education\Repo\Post\PostInterface;
use Education\Presenter\Post\PostPresenterInterface;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;
    protected $postPresenter;

    public function __construct(PostInterface $post, PostPresenterInterface $postPresenter)
    {
        $this->post = $post;
        $this->postPresenter = $postPresenter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->getAllPosts();
        return view('dashboard', $this->postPresenter->postsListViewModel($posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create-post', $this->postPresenter->createPostFormViewModel());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'post_content' => $request->input($this->postPresenter->createPostFormViewModel()['viewModel']['contentFieldName']),
            'user_id' => auth()->user()->id,
        );
        $this->post->create($data);

        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'post_content' => $request->input($this->postPresenter->createPostFormViewModel()['viewModel']['contentFieldName']),
            'id' => $id,
        );
        $this->post->update($data);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->byId($id);

        if ($post->isBelongToAuthUser()) {
            return view('posts.update-post', $this->postPresenter->editPostViewModel($post));
        }
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->deleteById($id);
        //return redirect()->route('dashboard');
        //Почему если установлен редирект, то AJAX возвращает ошибку 405. Без редиректа из контроллера все хорошо. 
        //Как этого избежать сохранив редирект из контроллера
    }
}
