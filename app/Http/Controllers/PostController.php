<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Validator;
use DB;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create')
            ->with('tags', $tags)
            ->with('title', 'Add new post');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SavePostRequest $request)
    {
        $post = Auth::user()->posts()->create( $request->all() );

        $post->tags()->sync( $request->get('tags') ?: [] );

        return redirect()->route('post.show', $post->id)
            ->with('message','New post added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);

        $tags = Tag::all();

        return view('posts.edit')
            ->with('title', 'Edit post')
            ->with('post', $post)
            ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);

        $post->update($request->all() );
        $post->tags()->sync( $request->get('tags') ?: [] );

        return redirect()->route('post.show', $post->id)
            ->with('message','New post added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
