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
        $posts = Post::latest('created_at')
            ->paginate(5);

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
        $post = $this->createPost($request);

        flash()->success('New post added.');

        return redirect()->route('post.show', $post->slug);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->firstOrFail();

        return view('posts.show')
            ->with('post', $post);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);

        $tags = Tag::all();

        return view('posts.edit')
            ->with('title', 'Edit post')
            ->with('tags', $tags)
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SavePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('edit-post', $post);

        $post->update($request->all() );
        $this->syncTags($post, $request->get('tags') );

        flash()->success('Post edited.');

        return redirect()->route('post.show', $post->slug);
    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.delete')
            ->with('title', 'Delete post')
            ->with('post', $post);
    }


    public function destroy($id)
    {
        Auth::user()->posts()->findOrFail($id)->delete();

        flash()->success("Successfully deleted");
        return redirect('/');
    }









    /**
     * synchronize tags for this post
     *
     * @param $post
     * @param $tags
     */
    private function syncTags($post, $tags)
    {
        $post->tags()->sync($tags ?: []);
//        $post->tags()->sync($request->get('tags') ?: []);
    }

    /**
     * @param SavePostRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createPost(SavePostRequest $request)
    {
        $post = Auth::user()->posts()->create($request->all());

        $this->syncTags($post, $request->get('tags'));
        return $post;
    }
}
