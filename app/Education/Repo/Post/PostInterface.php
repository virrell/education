<?php namespace Education\Repo\Post;

interface PostInterface{

    /**
     * Retrive post by id
     *
     * 
     *
     * @param  int $id Post ID
     * @return Post object of post information
     **/
    public function byId($id);

    public function create(array $data);

    public function update(array $data);

    public function deleteById($id);

    public function getAllPosts();

}