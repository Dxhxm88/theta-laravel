<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    // One comment belong to one post
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // One comment belong to one user
    public function commenter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
