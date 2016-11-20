<?php

namespace App\Http\Controllers;

use App\Tag;
//use App\User;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Display all posts with specific tag.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     * @internal param int $id
     */
    public function show($slug)
    {
        $tag = Tag::where('name',$slug)
            ->firstOrFail();

        $posts = $tag->posts()->paginate(5);

        return view('posts.index')
            ->with('title', $tag->name)
            ->with('posts', $posts);
    }
}
