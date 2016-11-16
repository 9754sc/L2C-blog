<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 2)->create();
        factory(App\Post::class, 3)->create();
        factory(App\Tag::class, 8)->create();
    }
}
