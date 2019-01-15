<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Book;

class SearchController extends Controller
{
    //码查询,返回视频url
    public function code(Request $request)
    {
        $code = $request->code;

        $cata =  Video::where('video_code', $code)->select('book_id','order')->get()->toarray();
        return (empty($cata))? 0:$cata;
    }

    //模糊搜索
    public function text(Request $request)
    {
        $title = $request->title;

        return Book::where('title','like','%'. $title .'%')
            ->select('id','cover_url','title','author','price','press','published_date','ISBN')
            ->paginate(9)->toArray();
    }
}
