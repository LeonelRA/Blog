<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $category = Category::create([
            'name' => 'without category',
            'slug' => Str::slug('without category', '_')
        ]);
        $category = Category::create([
            'name' => 'Html',
            'slug' => Str::slug('Html', '_')
        ]);
        $category = Category::create([
            'name' => 'Python',
            'slug' => Str::slug('Python', '_')
        ]);
        $category = Category::create([
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel', '_')
        ]);



        $tag = Tag::create([
            'name' => 'programming',
            'slug' => Str::slug('programming', '_')
        ]);
        $tag = Tag::create([
            'name' => 'Hacking',
            'slug' => Str::slug('Hacking', '_')
        ]);
        $tag = Tag::create([
            'name' => 'Hardware',
            'slug' => Str::slug('Hardware', '_')
        ]);
        $tag = Tag::create([
            'name' => 'sofware',
            'slug' => Str::slug('sofware', '_')
        ]);
        $tag = Tag::create([
            'name' => 'Hello word',
            'slug' => Str::slug('Hello word', '_')
        ]);

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
