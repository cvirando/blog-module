<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;
use Carbon\Carbon;
use DB;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->delete();
        $post = Post::create([
            'category_id' => '1',
            'name' => 'Hello World!',
            'slug' => 'hello-world',
            'photo' => null,
            'description' => '<h3>Welcome to Irando CRM.</h3><p>This is your first blog post, feel free to edit or remove it.</p>',
            'active' => true,
        ]);
    }
}
