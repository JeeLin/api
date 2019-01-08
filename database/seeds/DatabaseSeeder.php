<?php

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
        // 字典
        factory(App\Models\Banner::class, 5)->create();

        //用户
        factory(\App\Models\User::class,50)->create();

        //类型、图书、视频
        factory(\App\Models\Type::class,10)->create()->each(function($type){
            for ($i=0; $i <20 ; $i++) {
                $book = $type->book()->save(factory(\App\Models\Book::class)->create([
                    'type_id' => $type->id,
                ]));
                for ($j=0; $j <10 ; $j++) {
                    $book->video()->save(factory(\App\Models\Video::class)->create([
                        'book_id' => $book->id,
                        'order' => ($j + 1),
                    ]));
                }
            };
        });

        //收藏
        factory(\App\Models\Collection::class,500)->create()->each(function($coll){
            $coll->user()->save(factory(\App\Models\User::class)->make());

            $coll->book()->save(factory(\App\Models\Book::class)->make());
        });
    }
}

