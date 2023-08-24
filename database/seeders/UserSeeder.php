<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $data_user = User::create([
            'name' => 'Pradnya Kuswara',
            'email' => 'pradnyakuswara24@gmail.com',
            'password' => bcrypt('Kuswara1'),
            'image_path' => $faker->image('Storage/app/public/images', 640, 480,'animals',false),
        ]);

        $data_category = Categories::create([
            'category_name' => $faker->word(),
        ]);

        $data_tag = Tags::create([
            'tag_name' => $faker->word(),
        ]);

        for($i=0;$i<1;$i++){
           $data_article =  Articles::create([
                'title' => $faker->sentence(),
                'content' => $faker->text(1000),
                'image_path' => $faker->image('Storage/app/public/images', 1920, 1080,'animals',false),
                'user_id' => $data_user->id,
                'category_id' => $data_category->id
            ]);

            $tag = Tags::firstOrCreate([
                'tag_name' => $faker->word(),
            ]);
            $data_article->tags()->attach($tag);
        }
    }
}
