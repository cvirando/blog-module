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
use Illuminate\Support\Str;
use Storage;
use Image;
use Illuminate\Support\Facades\Schema;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin|staff','permission:add blog categories|edit blog categories|delete blog categories']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->with(['posts'])->get();
        return view('blog::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->active = $request->input('active');
        $category->description = $request->input('description');
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $category->slug. '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            $pathToThumbImage = public_path('images/thumb/'. $filename);
            $pathToBigImage = public_path('images/big/'. $filename);
            Image::make($image)->resize(1200, 672)->save($location); // for social media
            Image::make($image)->resize(250, 250)->save($pathToThumbImage);
            Image::make($image)->save($pathToBigImage);
            $category->photo = $filename;
        }
        if(Schema::hasTable('seos')) {
            if($category->save()) {
                $seo = new \Modules\Seo\Entities\Seo;
                $seo->name = $request->input('seo_name');
                $seo->tags = $request->input('seo_tags');
                $seo->description = $request->input('seo_description');
                if ($request->hasFile('seo_photo')) {
                    $image = $request->file('seo_photo');
                    $filename = 'seo-' . time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/'. $filename);
                    $pathToThumbImage = public_path('images/thumb/'. $filename);
                    $pathToBigImage = public_path('images/big/'. $filename);
                    Image::make($image)->resize(1200, 672)->save($location); // for social media
                    Image::make($image)->resize(250, 250)->save($pathToThumbImage);
                    Image::make($image)->save($pathToBigImage);
                    $seo->photo = $filename;
                }
                $seo->seoable_id = $category->id;
                $seo->seoable_type = 'Modules\Blog\Entities\Category';
                $category->save();
            }
        } else {
            $category->save();
        }
        return redirect()->route('blogCategories');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if(Schema::hasTable('seos')) {
            $seo = $category->seo()->first();
            return view('blog::categories.edit', compact('category', 'seo'));

        } else {
            return view('blog::categories.edit', compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->active = $request->input('active');
        $category->description = $request->input('description');
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $category->slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            $pathToThumbImage = public_path('images/thumb/'. $filename);
            $pathToBigImage = public_path('images/big/'. $filename);
            Image::make($image)->resize(1200, 672)->save($location); // for social media
            Image::make($image)->resize(250, 250)->save($pathToThumbImage);
            Image::make($image)->save($pathToBigImage);
            $oldFilename = $category->photo;
            $category->photo = $filename;
            if(!empty($category->photo)){
                Storage::delete($oldFilename);
            }
        }
        if(Schema::hasTable('seos')) {
            if($category->save()) {
                $seo = new \Modules\Seo\Entities\Seo;
                $seo->name = $request->input('seo_name');
                $seo->tags = $request->input('seo_tags');
                $seo->description = $request->input('seo_description');
                if ($request->hasFile('seo_photo')) {
                    $image = $request->file('seo_photo');
                    $filename = 'seo-' . time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/'. $filename);
                    $pathToThumbImage = public_path('images/thumb/'. $filename);
                    $pathToBigImage = public_path('images/big/'. $filename);
                    Image::make($image)->resize(1200, 672)->save($location); // for social media
                    Image::make($image)->resize(250, 250)->save($pathToThumbImage);
                    Image::make($image)->save($pathToBigImage);
                    $seo->photo = $filename;
                }
                $seo->seoable_id = $category->id;
                $seo->seoable_type = 'Modules\Blog\Entities\Category';
                $category->save();
            }
        } else {
            $category->save();
        }
        return redirect()->route('blogCategories');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('blogCategories');
    }
}
