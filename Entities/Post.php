<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Category;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Schema;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'blog_posts';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'photo',
        'description',
        'active',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seo() {
        if(Schema::hasTable('seos')) {
            return $this->morphMany('Modules\Seo\Entities\Seo', 'seoable');
        }
        return null;
    }

    public function verifySeo() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing('seos');
    }
}
