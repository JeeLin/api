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
        //轮播图10
        factory(\App\Models\Banner::class, 10)->create();

        //用户5
        factory(\App\Models\User::class,10)->create();

        //类型5
        factory(\App\Models\Type::class,5)->create();

        factory(\App\Models\Book::class,10)->create()->each(function($book){
            for ($i=0; $i < 2; $i++) {
                $book->sorts()->save(factory(\App\Models\Sort::class)->create([
                                'book_id' => $book->id
                ]));
            };
            for ($i=0; $i < 8; $i++) {
                $book->videos()->save(factory(\App\Models\Video::class)->create([
                                    'book_id' => $book->id,
                                    'order' => ($i + 1)
                ]));
            };
            for ($i=0; $i < 3; $i++) {
                $book->collections()->save(factory(\App\Models\Collection::class)->create([
                                'book_id' => $book->id
                ]));
            };
            for ($i=0; $i < 3; $i++) {
                $book->logs()->save(factory(\App\Models\Log::class)->create([
                                'book_id' => $book->id
                ]));
            };
        });

        // //类型、图书、视频
        // factory(\App\Models\Type::class,5)->create()->each(function($type){
        //     for ($i=0; $i < 10; $i++) {
        //         $book = $type->books()->save(factory(\App\Models\Book::class)->create([
        //             'type_id' => $type->id
        //         ]));
        //         for ($j=0; $j < 5; $j++) {
        //             $book->video()->save(factory(\App\Models\Video::class)->create([
        //                 'book_id' => $book->id,
        //                 'order' => ($j + 1),
        //             ]));
        //         }
        //     }
        // });

        // //收藏
        // factory(\App\Models\Collection::class,10)->create()->each(function($coll){
        //     $coll->user()->save(factory(\App\Models\User::class)->make());
        //     $coll->book()->save(factory(\App\Models\Book::class)->make());
        // });

        // //用户与图书兴趣分
        // factory(\App\Models\Log::class,10)->create()->each(function($coll){
        //     $coll->user()->save(factory(\App\Models\User::class)->make());
        //     $coll->book()->save(factory(\App\Models\Book::class)->make());
        // });
    }
}
