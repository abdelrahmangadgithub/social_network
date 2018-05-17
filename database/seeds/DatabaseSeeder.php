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
        $faker = Faker\Factory::create();
      //make object to genrate database tables for users @ posts @ Category and other elements  


      //data base seeding for Users
        for ($i=0; $i < 100; $i++) {
            App\User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'profile_picture' => "http://gravatar.com/avatar/" . md5(strtolower(trim($faker->email))) . "?d=monsterid",
                'bio' => str_random(100)

                            ]);
        }


          //data base seeding for posts
        for ($i=0; $i < 300; $i++) {
            App\Post::create([
                'title' => $faker->title,
                'body' =>str_random(150),
                'category_id' => rand(0,20),
                'user_id' => rand(0, 100)
            ]);
        }

          //data base seeding for Category
        for ($i=0; $i < 30; $i++) {
            App\Category::create([
                'name' => $faker->name,
                'user_id' => rand(0, 100)
            ]);
        }

          //data base seeding for Comments
          for ($i=0; $i < 450; $i++) {
            App\Comment::create([
                'comment' => str_random(50),
                'user_id' => rand(0, 100),
                'post_id' =>rand(0, 100)
            ]);
        }

          //data base seeding for like
        for ($i=0; $i < 500; $i++) {
            App\Like::create([
                'like' =>rand(0, 1),
                'user_id' => str_random(100),
                'post_id' =>str_random(100)
       ]); 

        }
        
    }
}
