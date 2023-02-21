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

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->with(['category'])->get();
        return view('blog::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('blog::posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->name = $request->input('name');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $post->slug. '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            $pathToThumbImage = public_path('images/thumb/'. $filename);
            $pathToBigImage = public_path('images/big/'. $filename);
            Image::make($image)->resize(1200, 672)->save($location); // for social media
            Image::make($image)->resize(250, 250)->save($pathToThumbImage);
            Image::make($image)->save($pathToBigImage);
            $post->photo = $filename;
        }
        $post->save();
        return view('blog::posts.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->get();
        return view('blog::posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $request->input('name');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $post->slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            $pathToThumbImage = public_path('images/thumb/'. $filename);
            $pathToBigImage = public_path('images/big/'. $filename);
            Image::make($image)->resize(1200, 672)->save($location); // for social media
            Image::make($image)->resize(250, 250)->save($pathToThumbImage);
            Image::make($image)->save($pathToBigImage);
            $oldFilename = $post->photo;
            $post->photo = $filename;
            if(!empty($post->photo)){
                Storage::delete($oldFilename);
            }
        }
        $post->save();
        return view('blog::posts.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return view('blog::posts.index');
    }
}
