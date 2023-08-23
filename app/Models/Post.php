<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    // belong to a user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One Post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
