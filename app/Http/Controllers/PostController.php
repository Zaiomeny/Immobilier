<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, string $slug)
    {

        $expectedSlug = $post->getSlug();

        if ($expectedSlug !== $slug) {
            $slug = $expectedSlug;
            return redirect()->route('post.show',['post' => $post,'slug' => $slug]);
        }

        return view('posts.show', ['post' => $post, 'slug' => $slug]);
    }
    public function edit(Post $post, string $slug)
    {
        $expectedSlug = $post->getSlug();

        if ($expectedSlug !== $slug) {
            $slug = $expectedSlug;
            return redirect()->route('post.edit',['post' => $post,'slug' => $slug]);
        }

        return view('posts.edit', ['post' => $post, 'slug' => $slug]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
