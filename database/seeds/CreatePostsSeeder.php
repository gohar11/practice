<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;
class CreatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::first()->where(['title' => 'sports'])->get();
        $post = new Post;
        $post->title = 'Football Ball';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);

        $category = Category::first()->where(['title' => 'tools'])->get();
        $post = new Post;
        $post->title = 'Wooden Tools';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);

        $category = Category::first()->where(['title' => 'mobile'])->get();
        $post = new Post;
        $post->title = 'Samsung';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);
        $post = new Post;
        $post->title = 'Iphone';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);

        $category = Category::first()->where(['title' => 'laptop'])->get();
        $post = new Post;
        $post->title = 'Acer';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);

        $category = Category::first()->where(['title' => 'vehicle'])->get();
        $post = new Post;
        $post->title = 'Cars';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);
        $post = new Post;
        $post->title = 'Motorcycles';
        $post->body = 'placebolder content for body';
        $post->save();
        $post->category()->attach($category);


    }
}
