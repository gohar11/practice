<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRoles::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateCategorySeeder::class);
        $this->call(CreatePostsSeeder::class);
    }
}
