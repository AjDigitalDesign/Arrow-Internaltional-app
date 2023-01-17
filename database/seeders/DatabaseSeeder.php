<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
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
        Role::factory(1)->create();
        Role::factory(1)->create([
            'name' => 'admin'
        ]);
        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->image()->save(Image::factory()->make());
        }


        Category::factory(10)->create();
        $posts = Post::factory(10)->create();

        Comment::factory(50)->create();
        Tag::factory(10)->create();

        foreach ($posts as $post) {
            $tags_ids = [];
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;

            $post->tags()->sync($tags_ids);
            $post->image()->save(Image::factory()->make());

        }



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
