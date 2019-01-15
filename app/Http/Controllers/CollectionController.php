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
}
