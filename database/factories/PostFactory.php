<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15),
            'slug' => $this->faker->unique()->text(15),
            'excerpt' => $this->faker->text(155),
            'body' => $this->faker->text(300),
            'published_at' => $this->faker->dateTime(),
            'status_id' => $this->faker->randomFloat(0,1, 3),
            'category_id' => $this->faker->randomFloat(0,1, 4)
        ];
    }
}
