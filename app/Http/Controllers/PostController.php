<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return User::all()->random(); // Get any user randomly
        //return User::inRandomOrder()->get(); ## ERROR

        //return User::inRandomOrder()->first()->id(); ## ERROR

        //$posts = Post::with(['comments', 'user', 'postStatus', 'reactions'])->get(); // Here means we have in the post a function called comment that returns class Comment

        $posts = Post::with([ 'user', 'postStatus'])->withCount(['comments', 'reactions']) ->get(); // Here means we have in the post a function called comment that returns class Comment
        return $posts;
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
    public function store(StorePostRequest $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
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
