<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
    // use HasFactory;
    static $blog_post = [
        [
            'title' => "Lorem ipsum",
            'author' => "M Alfa",
            'slug' => 'lorem-ipsum',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus magnam molestiae repudiandae laborum alias! Dolorem, molestias. Eum obcaecati eveniet doloribus beatae perferendis dignissimos excepturi maiores, similique officia asperiores magnam fuga cum, dicta consectetur enim dolorem minus odio quisquam velit molestiae tempora doloremque, aperiam mollitia ipsa? Itaque harum ea fugiat eligendi doloribus, quasi iste dolorem facilis velit beatae ut quam incidunt nulla omnis inventore repellendus. Deserunt voluptas perferendis ea dolorem in nisi dolorum, amet ratione cupiditate, explicabo omnis impedit illum voluptatibus facilis delectus nam magni quos voluptatem ad vero, recusandae illo expedita eaque ipsa. Maiores amet eveniet rem, praesentium tempora perspiciatis.'
        ],
        [
            'title' => "Lorem ipsum 2",
            'author' => "Chef Adit",
            'slug' => 'lorem-ipsum-2',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea eius fugit qui quisquam incidunt assumenda quidem, nihil quos voluptatibus. Sit omnis unde maiores aspernatur. Accusantium fugit corporis officia ullam facilis perferendis laborum earum eaque vel ad! Ut, delectus sapiente laudantium quis aperiam facilis tempora. Fugit vel cupiditate adipisci repellendus, exercitationem odio consequuntur optio praesentium modi aspernatur quam facilis debitis repellat recusandae molestiae illo ipsam quo, animi vero temporibus, rerum accusantium. Pariatur vero et, minus tempore voluptatibus fugiat ea sapiente modi dolores maiores veritatis aspernatur quibusdam provident! Fugit, adipisci quo, unde obcaecati iste reiciendis quaerat aut at maxime eos eius dolorem cum. In iusto cum blanditiis esse doloribus modi? Nam esse eveniet, ipsum nobis, incidunt totam ut veniam aliquid eos, modi saepe alias. Quaerat ex quas rem tenetur, repudiandae pariatur voluptatum ullam sunt consequatur possimus aliquid sit voluptatem ipsum natus tempora illo, sequi eos suscipit. Eaque nulla ad maxime porro, cupiditate obcaecati id facere? Excepturi, accusamus aut architecto sapiente obcaecati dicta aspernatur. Rem tempore dolorum, magnam suscipit ad animi ipsa nam praesentium dolor illo labore doloremque amet asperiores incidunt nisi esse totam explicabo fugit vel non saepe corporis nihil? Recusandae repellat amet laboriosam a magni quasi? Sunt minima quo ducimus porro.'
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
