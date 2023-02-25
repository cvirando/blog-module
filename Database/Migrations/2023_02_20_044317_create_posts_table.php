<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('photo')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
