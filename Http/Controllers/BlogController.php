<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('active', true)->with(['category'])->get();
        return view('blog::index', compact('posts'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('active', true)->with(['category'])->first();
        return view('blog::show', compact('post'));
    }
}
