<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::with('users')->where(['name' => 'admin'])->first()->toArray();
        $user_id = $user['users'][0]['id'];

        $category = new Category;
        $category->user_id = $user_id;
        $category->title = 'sports';
        $category->description = 'Placeholder for category description';
        $category->save();

        $category = new Category;
        $category->user_id = $user_id;
        $category->title = 'tools';
        $category->description = 'Placeholder for category description';
        $category->save();

        $category = new Category;
        $category->user_id = $user_id;
        $category->title = 'mobile';
        $category->description = 'Placeholder for category description';
        $category->save();

        $category = new Category;
        $category->user_id = $user_id;
        $category->title = 'laptop';
        $category->description = 'Placeholder for category description';
        $category->save();

        $category = new Category;
        $category->user_id = $user_id;
        $category->title = 'vehicle';
        $category->description = 'Placeholder for category description';
        $category->save();
    }
}
