<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Book;

class CollectionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    //个人收藏界面
    public function show(Request $request)
    {
        $user_id = $request->user_id;
        $book_id_array = Collection::where('user_id',$user_id)
                        ->select('book_id')->get()->toArray();
        $array = array();
        foreach ($book_id_array as $i) {
            array_push($array,Book::where('id',$i)->get()->toArray());
        };
        return $array;
    }

    //个人收藏状态改变
    public function change(Request $request)
    {
        $user_id = $request->user_id;
        $book_id = $request->book_id;
        $array = array('user_id' => $user_id,'book_id' => $book_id);
        $res = Collection::where($array)->get();
        if($res->count()){
            Collection::where($array)->delete();
            $status = TRUE;
            $mess = '已删除';
        }else{
            $this->insert_new($user_id,$book_id);
            $status = FALSE;
            $mess = '已收藏';
        };
        return response()->json(['status'=>$status,'message'=>$mess]);
    }

    public function insert_new($user_id,$book_id)
    {
        $coll = new Collection;
        $coll->user_id = $user_id;
        $coll->book_id = $book_id;

        $coll->save();
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
