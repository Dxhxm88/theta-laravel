<?php

namespace App\Services;

use App\Models\Post;

class PostService {


    /**
     * Store post
     *
     * @param  mixed $data
     * @return App\Models\Post
     */
    public function store($data, $user_id)
    {
        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $user_id
        ]);

        return $post;
    }

    public function update($data,$post_id,$user_id)
    {
        $post = Post::find($post_id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->save();

        return $post;
    }
}
