<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Category;
use Carbon\Carbon;
use DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->delete();
        $category = Category::create([
            'name' => 'Default Category',
            'slug' => 'default-category',
            'photo' => null,
            'description' => '<p>This is your default category, feel free to edit or remove it.</p>',
        ]);
    }
}
