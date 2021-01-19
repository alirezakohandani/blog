<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
        $post_type = ['article', 'podcast', 'video'];
        $key = array_rand($post_type);
        // $user = User::select()->orderByRaw("RAND()")->first();

        
        // foreach($user->roles as $role)
        // {
        //     dd($role->role);
        //     if ($role->role === 'author') {
        //         dd('yes');
        //     }
        // }
        
        return [
            'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
            'title' => $this->faker->title(),
            'body' => $this->faker->text(),
            'thumb' => 'default-post.png',
            'slug' => 'slug-'. $this->faker->slug(),
            'post_type' =>  $post_type[$key],
            'file' => 'test.mp4',
            'status' => 'draft'
        ];
    }
}
