<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //模糊搜索
    public function text(Request $request)
    {
        $title = $request->title;

        return Book::where('title','like','%'. $title .'%')
            ->select('id','cover_url','title','author','price','press','published_date','ISBN')
            ->paginate(9)->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //分类内图书
    public function index(Request $request)
    {
        $type_id = $request->type_id;

        return Book::where('type_id',$type_id)
            ->select('id','cover_url','title')
            ->paginate(12)->toArray();
    }

    //图书推荐
    public function recommend(Request $request)
    {
        $page = $request->page;
        $x = ($page > 1)?3:6;
        return Book::select('id','cover_url','title')
        ->paginate($x)->toArray();
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
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        //
    }
}
