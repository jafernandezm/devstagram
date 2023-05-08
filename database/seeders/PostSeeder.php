<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => '
        //     ',
        // ]);
        Post::factory()->count(10)->create();
    }
}