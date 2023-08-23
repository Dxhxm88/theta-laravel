<?php

namespace App\Services;

use App\Models\Comment;

class CommentService {

    /**
     * store comment
     *
     * @param  mixed $data
     * @param  mixed $post_id
     * @param  mixed $user_id
     * @return App\Models\Comment
     */
    public function store($data, $post_id, $user_id)
    {
        $comment = Comment::create([
            'text' => $data['text'],
            'post_id' => $post_id,
            'user_id' => $user_id
        ]);

        return $comment;
    }
}
