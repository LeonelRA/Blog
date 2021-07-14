<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Status;
use App\Models\Post;

use App\Models\Comment;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create(['name' => 'without category']);
        $category = Category::create(['name' => 'Html']);
        $category = Category::create(['name' => 'Python']);
        $category = Category::create(['name' => 'Laravel']);

        $tag = Tag::create(['name' => 'programming']);
        $tag = Tag::create(['name' => 'Hacking']);
        $tag = Tag::create(['name' => 'Hardware']);
        $tag = Tag::create(['name' => 'sofware']);
        $tag = Tag::create(['name' => 'Hello word']);

        $status = Status::create(['name' => 'public']);
        $status = Status::create(['name' => 'private']);
        $status = Status::create(['name' => 'eraser']);


        $users = User::factory(5)
            ->create()
            ->each(function ($user){
                $profile = Profile::factory()->make();

                $user->profile()->save($profile);
            });

        $posts = Post::factory(30)
            ->make()
            ->each(function ($post) use ($users){
                $post->user_id = $users->random()->id;
                
                $post->save();
            });

        $comments = Comment::factory(20)
            ->make()
            ->each(function ($comment) use ($posts, $users){
                 $comment->post_id = $posts->random()->id;
                 $comment->user_id = $users->random()->id;

                $comment->save();               
            });
    }
}
