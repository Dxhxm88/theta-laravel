<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'text' => ['required', 'max:50']
        ]);

        $comment = $this->commentService->store($validatedData, $post->id ,auth()->user()->id);

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
