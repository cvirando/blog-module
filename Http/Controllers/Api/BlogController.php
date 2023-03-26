<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Http\Controllers\Api;

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
        return response()->json([
            'data' => $posts,
        ], 200);
    }

    /**
     * Show the specified post resource.
     * @param int $id
     * @return Renderable
     */
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('active', true)->with(['category', 'seo'])->first();
        return response()->json([
            'data' => $post,
        ], 200);
    }

    /**
     * Show the specified category resource.
     * @param int $id
     * @return Renderable
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('active', true)->with(['seo', 'posts'])->first();
        return response()->json([
            'data' => $category,
        ], 200);
    }
}
