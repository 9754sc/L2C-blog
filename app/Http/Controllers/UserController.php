<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use \App\User as Bloguser;

use App\Post;
use App\User;

class UserController extends Controller
{

    public function show($id, $slug)
    {
        $user = User::where([
            ['slug', $slug],
            ['id', $id]
            ])
            ->firstOrFail();

        $posts = $user->posts;

        return view('posts.index')
            ->with('title', $user->name)
            ->with('posts', $posts);
    }


}
