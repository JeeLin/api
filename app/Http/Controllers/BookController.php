<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
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
            ->paginate(12);
    }

    //图书推荐
    public function recommend(Request $request)
    {
        $page = $request->page;
        $x = ($page > 1)?3:6;
        return Book::select('id','cover_url','title')
        ->paginate($x)->toArray();
    }
}
