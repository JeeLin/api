<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //视频所属书籍
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
