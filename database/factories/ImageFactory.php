<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Exists;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'author0.jpeg',
            'author1.jpeg',
            'author2.jpeg',
            'author3.jpeg',
            'author4.jpeg',
        ];
        $random_image = array_rand($images);

        $imageables = Image::select('imageable_id', 'imageable_type')->get();

        $user_post_id = [
            User::select('id')->orderByRaw("RAND()")->first()->id,
            Post::select('id')->orderByRaw("RAND()")->first()->id
           ];
   
           $random_user_post = array_rand($user_post_id);
        
        if ($imageables) {    
           foreach ($imageables as $image) {
               if (($image->imageable_id == $user_post_id[$random_user_post] && $image->imageable_type == 'App\Models\User') ||
                   ($image->imageable_id == $user_post_id[$random_user_post] && $image->imageable_type == 'App\Models\Post')) 
               {
                   //To Do
                   dd('imageable_id and imageable_id must be unique. please try again');
               }
           }
        }

        return [
            'url' => $images[$random_image],
            'imageable_id' => $user_post_id[$random_user_post],
            'imageable_type' => ($random_user_post == 0) ? 'App\Models\User' : 'App\Models\Post',    
        ];
    }
}
