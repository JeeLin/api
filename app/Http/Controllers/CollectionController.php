<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\User;
use App\Models\Book;


class CollectionController extends Controller
{
    //个人收藏状态改变
    public function change(Request $request)
    {
        $user_id = $request->user_id;
        $book_id = $request->book_id;
        $user = User::find($user_id);
        $book = Book::find($book_id);

        $user->books()->toggle($book);
        //还没有时间戳
    }

    public function insert_new($user_id,$book_id)
    {
        $coll = new Collection;
        $coll->user_id = $user_id;
        $coll->book_id = $book_id;

        $coll->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(collection $collection)
    {
        //
    }
}
