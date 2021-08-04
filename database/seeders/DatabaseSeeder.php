<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        User::factory(4)->create();
        // User::create([
        //     'name' => 'Alfa Riza',
        //     'email' => 'malfariza45@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Hobi',
            'slug' => 'hobi'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Post 1',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'post1',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum mollitia at libero optio recusandae.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum mollitia at libero optio recusandae. Doloribus consectetur voluptatibus laborum vel sit harum illo a ea ab ad modi temporibus quibusdam tempora voluptates cum, molestias aspernatur alias. Similique vero inventore, ipsum nostrum possimus temporibus explicabo at iste cum quo veritatis ullam minima dicta esse itaque recusandae assumenda voluptate. Magni, autem deserunt quas quo quod fugiat, doloremque eos incidunt harum commodi modi ad repellendus voluptate necessitatibus sequi architecto, labore saepe inventore quasi libero quaerat minima. Mollitia facere, ullam voluptate quis in cupiditate deleniti assumenda quibusdam. Corporis velit eveniet minus repellat, dolorum voluptatum voluptas!'
        // ]);
    }
}
